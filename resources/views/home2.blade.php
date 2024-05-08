@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl">
            <div class="card">
                <div class="control-part1">
                    <button class="btn btn-danger" id="prevBtn">&lt;</button>
                    <h2 id="monthYear"></h2>
                    <button class="btn btn-danger" id="nextBtn">&gt;</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered monthly-table" id="calendar">
                        <thead>
                            <tr></tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

            <!-- Add a modal for choosing month/year -->
            <div class="modal fade" id="chooseMonthYearModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">月/年を選択してください。</h5>
                            <button type="button" class="cancel_btn btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="selectMonth">Month:</label>
                                <select class="form-control" id="selectMonth">
                                    <option value="0">1月</option>
                                    <option value="1">2月</option>
                                    <option value="2">3月</option>
                                    <option value="3">4月</option>
                                    <option value="4">5月</option>
                                    <option value="5">6月</option>
                                    <option value="6">7月</option>
                                    <option value="7">8月</option>
                                    <option value="8">9月</option>
                                    <option value="9">10月</option>
                                    <option value="10">11月</option>
                                    <option value="11">12月</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="selectYear">年:</label>
                                <input type="number" class="form-control" id="selectYear" min="1970" max="2100"
                                    value="2024">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close_btn btn btn-danger">
                                閉じる
                            </button>
                            <button type="button" class="btn btn-primary" id="applyChangesBtn">
                                変更
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let currentDate = new Date();

            // Function to generate the calendar
            function renderCalendar() {
                const thead = $("#calendar thead tr");
                const tbody = $("#calendar tbody");
                thead.html("");
                tbody.html("");
                const daysInMonth = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() + 1,
                    0
                ).getDate();
                const japaneseMonths = [
                    "1月", "2月", "3月", "4月", "5月", "6月",
                    "7月", "8月", "9月", "10月", "11月", "12月"
                ];
                $("#monthYear").text(
                    `${japaneseMonths[currentDate.getMonth()]} ${currentDate.getFullYear()}`
                );

                // Generate calendar header
                const japaneseDayNames = ["日", "月", "火", "水", "木", "金", "土"];
                for (let day = 0; day <= daysInMonth + 1; day++) {
                    const currentDateForDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    const dayOfWeekIndex = currentDateForDay.getDay(); // Get the day of the week index (0-6)
                    const dayOfWeekJapanese = japaneseDayNames[dayOfWeekIndex]; // Get the corresponding Japanese day name

                    let thText;
                    if (day === 0) {
                        thText = "学年";
                    } else if (day === daysInMonth + 1) {
                        thText = "個数";
                    } else {
                        thText = `<div>${day}</div> <div>${dayOfWeekJapanese}</div>`;
                    }

                    const th = $("<th>").html(`${thText}`);
                    
                    // Check if the day is equal to the current day
                    if (day === currentDate.getDate()) {
                        th.addClass("current-day"); 
                    }

                    thead.append(th);
                }

                $.post("{{ route('home.get') }}", {
                    "_token": $('meta[name="csrf_token"]').attr('content'),
                }, function(data) {
                    if (data.status == 200) {
                        const daysInMonth = new Date(
                            currentDate.getFullYear(),
                            currentDate.getMonth() + 1,
                            0
                        ).getDate();

                        const grades = ['1年', '2年', '3年', '4年', '5年', '6年', '合計'];
                        for (let i = 1; i < 8; i++) {
                            const tbody = $("#calendar tbody");
                            const row = $("<tr>");
                            const gradeCell = $("<td>").text(grades[i - 1]);
                            row.append(gradeCell);
                            for (let j = 1; j <= daysInMonth + 1; j++) {
                                const cell = $("<td>");
                                const formattedDate =
                                    `${currentDate.getFullYear()}-${('0' + (currentDate.getMonth() + 1)).slice(-2)}-${('0' + j).slice(-2)}`;
                                const formattedDate1 =
                                    `${currentDate.getFullYear()}-${('0' + (currentDate.getMonth() + 1)).slice(-2)}`;

                                if (i !== 7 && data.orderCount[i] && data.orderCount[i][formattedDate] !==
                                    undefined) {
                                    cell.text(data.orderCount[i][formattedDate]);
                                }
                                if (i == 7 && j != daysInMonth + 1 && data.orderByDate && data.orderByDate[
                                        formattedDate] !== undefined) {
                                    cell.text(data.orderByDate[formattedDate]);
                                    cell.css("background-color", "#ffff00");
                                    cell.css("color", "#000");
                                }
                                if (i != 7 && j == daysInMonth + 1 && data.orderByMonth && data
                                    .orderByMonth[i] && data.orderByMonth[i][formattedDate1] !== undefined
                                    ) {
                                    cell.text(data.orderByMonth[i][formattedDate1]);
                                    cell.css("background-color", "#00ff00")
                                    cell.css("color", "#000");
                                }
                                if (i == 7 && j == daysInMonth + 1 && data.totalOrdersByMonth && data
                                    .totalOrdersByMonth[formattedDate1] !== undefined) {
                                    cell.text(data.totalOrdersByMonth[formattedDate1]);
                                    cell.css("background-color", "#ff0000")
                                    cell.css("color", "#000");
                                }
                                row.append(cell);
                            }
                            tbody.append(row);
                        }

                    } else if (data.status == 401) {
                        toastr.error(data.message);
                    }
                }, 'json').catch((error) => {
                    toastr.error("エラーが発生しました。");
                });
            }

            // Function to update calendar when a new month/year is selected
            function updateCalendar() {
                const selectedMonth = parseInt($("#selectMonth").val());
                const selectedYear = parseInt($("#selectYear").val());
                currentDate = new Date(selectedYear, selectedMonth, 1);
                renderCalendar();
            }

            // Open modal when clicking on the month/year header
            $("#monthYear").on("click", function() {
                $("#chooseMonthYearModal").modal("show");
            });

            // Apply changes button click event
            $("#applyChangesBtn").on("click", function() {
                updateCalendar();
                $("#chooseMonthYearModal").modal("hide");
            });

            $(".close_btn").on("click", function() {
                $("#chooseMonthYearModal").modal("hide");
            });

            $(".cancel_btn").on("click", function() {
                $("#chooseMonthYearModal").modal("hide");
            });


            // Prev
            function prevMonth() {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            }

            // Next
            function nextMonth() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            }

            $("#prevBtn").on("click", prevMonth);
            $("#nextBtn").on("click", nextMonth);
            renderCalendar();
        });
    </script>
@endsection
