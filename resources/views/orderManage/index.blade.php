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
                            <td id="user_id">{{ $user_info->id }}</td>
                            <td>{{ $user_info->c_name1 }}</td>
                            <td>
                                @if ($user_info->c_grade == 7) 
                                    先生    
                                @else
                                {{ $user_info->c_grade }}
                                @endif
                            </td>
                            <td>{{ $user_info->grade_year }}</td>
                            <td>{{ $user_info->p_name1 }}</td>
                            <td>{{ $user_info->p_phone }}</td>
                            <td>{{ $user_info->address }}</td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" value={{ json_encode($order_info) }} id="order_info">
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

    <!-- Add a modal for choosing quantity -->
    <div class="modal fade" id="changeQuantity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">「普通食」の数量変更</h5>
                    <button type="button" class="cancel_btn btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="changeDate">変更日</label>
                        <input type="text" class="form-control" id="changeDate" name="changeDate">
                    </div>
                    <div class="form-group">
                        <label for="setQuantity">数量</label>
                        <input type="number" class="form-control" id="setQuantity" min="0" max="1"
                            value="1">
                    </div>
                    <div class="form-group">
                        <label for="changeDate">変更理由</label>
                        <textarea class="form-control" id="changeReason" name="changeReason"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="close_btn btn btn-danger">
                        閉じる
                    </button>
                    <button type="button" class="btn btn-primary" id="saveChangeBtn">
                        保存
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            let currentDate = new Date();
            var change_date, change_id, change_quantity, change_reason;

            function changeQuantity(curDate) {
               $("#changeQuantity").modal("show");
               $("#changeDate").val(curDate);
               change_date = curDate;
               change_id = parseInt($("#user_id").text());
            }
            
            $("#saveChangeBtn").click(function() {
               change_quantity = $("#setQuantity").val();
               change_reason = $("#changeReason").val();
                if (change_quantity == "" || change_quantity == null) {
                    toastr.error("数量を入力してください。");
                    $("#setQuantity").focus();
                } else if (change_reason == "" || change_reason == null) {
                    toastr.error("変更理由を入力してください。");
                    $("#changeReason").focus();
                } else {
                    $.post("{{ route('orderManage.update') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "change_id": change_id,
                        "change_date": change_date,
                        "change_quantity": change_quantity,
                        "change_reason": change_reason,
                    }, function(data) {
                        if (data.status == 200) {
                            toastr.success(data.message);
                            window.location.reload(true);
                        } else if (data.status == 401) {
                            toastr.error(data.message);
                        }
                    }, 'json').catch((error) => {
                        toastr.error("エラーが発生しました。");
                    });
                }
            })

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

                // Generate calendar
                const japaneseDayNames = ["日", "月", "火", "水", "木", "金", "土"];
                for (let day = 1; day <= daysInMonth; day++) {
                    const currentDateForDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    const dayOfWeekIndex = currentDateForDay.getDay(); // Get the day of the week index (0-6)
                    const dayOfWeekJapanese = japaneseDayNames[
                        dayOfWeekIndex
                    ]; // Get the corresponding Japanese day name

                    const thText = `<div>${day}</div> <div>${dayOfWeekJapanese}</div>`;
                    const th = $("<th>").html(`${thText}`);
                    thead.append(th);
                }

                // Add additional headers separately
                const thProduct = $("<th>").html("商品");
                const thQuantity = $("<th>").html("個数");
                const thUnitPrice = $("<th>").html("単価");
                const thSubtotal = $("<th>").html("小計");
                thead.prepend(thProduct);
                thead.append(thQuantity, thUnitPrice, thSubtotal);


                // Create one row in the table body
                var order_info_json = $("#order_info").val();
                if (order_info_json) {
                    order_info = JSON.parse(order_info_json);
                    //  console.log(order_info);
                    const tr = $("<tr>");
                    var quantity = 0;
                    for (let i = 1; i <= daysInMonth; i++) {
                        const year = currentDate.getFullYear();
                        const month = currentDate.getMonth() + 1;
                        const day = i;
                        const formattedMonth = month < 10 ? `0${month}` : month;
                        const formattedDay = day < 10 ? `0${day}` : day;
                        const curDate = `${year}-${formattedMonth}-${formattedDay}`;

                        const cell = $("<td></td>");
                        tr.append(cell);
                        cell.text("");
                        if (order_info.find((item) => {
                                return item === curDate
                            })) {
                            quantity++;
                            cell.text("1");
                            cell.css("cursor", "pointer");
                            cell.on("click", function() {
                                changeQuantity(curDate);
                            });
                        }
                    }
                    tbody.append(tr);

                    //   console.log(quantity)
                    const tdProduct = $("<td>").text("普通食");
                    const tdQuantity = $("<td>").text(quantity);
                    const tdUnitPrice = $("<td>").text("500");
                    const tdSubtotal = $("<td>").text(quantity * 500);
                    tr.prepend(tdProduct);
                    tr.append(tdQuantity, tdUnitPrice, tdSubtotal);
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
                $("#changeQuantity").modal("hide");
            });

            $(".cancel_btn").on("click", function() {
                $("#chooseMonthYearModal").modal("hide");
                $("#changeQuantity").modal("hide");
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
