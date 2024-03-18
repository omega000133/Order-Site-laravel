@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">注文管理</h4>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>児童氏名</th>
                            <th>学年</th>
                            <th>卒業年代</th>
                            <th>保護者氏名</th>
                            <th>電話番号</th>
                            <th>住所</th>
                        </tr>
                    </thead>
                    <tbody id="user-tbody">
                        <tr>
                            <td>{{ $order_info->id }}</td>
                            <td>{{ $order_info->c_name1 }}</td>
                            <td>{{ $order_info->c_grade }}</td>
                            <td>{{ $order_info->grade_year }}</td>
                            <td>{{ $order_info->p_name1 }}</td>
                            <td>{{ $order_info->p_phone }}</td>
                            <td>{{ $order_info->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- calendar --}}
    <div class="card mt-3">
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
    <div class="modal fade" id="chooseMonthYearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                for (let day = 0; day <= daysInMonth + 3; day++) {
                    const currentDateForDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    const dayOfWeekIndex = currentDateForDay.getDay(); // Get the day of the week index (0-6)
                    const dayOfWeekJapanese = japaneseDayNames[
                        dayOfWeekIndex
                    ]; // Get the corresponding Japanese day name

                    let thText;
                    if (day === 0) {
                        thText = "商品";
                    } else if (day === daysInMonth + 1) {
                        thText = "個数";
                    } else if (day === daysInMonth + 2) {
                        thText = "単価";
                    } else if (day === daysInMonth + 3) {
                        thText = "小計";
                    } else {
                        thText = `<div>${day}</div> <div>${dayOfWeekJapanese}</div>`;
                    }

                    const th = $("<th>").html(`${thText}`);
                    thead.append(th);
                }
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
