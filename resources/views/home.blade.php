@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl schedule-calendar">
            <div class="card home-card">
                <div class="control-part1">
                    <button class="btn btn-danger" id="prevBtn">&lt;</button>
                    <h2 id="monthYear"></h2>
                    <button class="btn btn-danger" id="nextBtn">&gt;</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="calendar">
                        <thead>
                            <tr>
                                <th data-day="0">日</th>
                                <th data-day="1">月</th>
                                <th data-day="2">火</th>
                                <th data-day="3">水</th>
                                <th data-day="4">木</th>
                                <th data-day="5">金</th>
                                <th data-day="6">土</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="control-part2">
                <div class="btn-group1">
                    <button class="btn btn-primary" id="every-use">毎日利用</button>
                    <button class="btn btn-success" id="order-save">注文確定</button>
                </div>
                <div class="btn-group2">
                    <button class="btn btn-danger" id="every-cancel">キャンセル</button>
                </div>
            </div>
        </div>
        @if(!empty($totalOrders))
        <input type="hidden" id="totalOrders" value="{{ json_encode($totalOrders) }}">
        @else
            <input type="hidden" id="totalOrders" value="[]">
        @endif
    </div>


    <div class="modal" id="check-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">お知らせ</h4>
                    <button type="button" class="cancel_btn btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-4 mt-2">
                            <div class="form-floating form-floating-outline">
                                <p>15時が過ぎると翌日のご注文について変更することはできません。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close_btn btn btn-label-secondary">
                        閉じる
                    </button>
                    <button type="button" class="btn btn-primary" id="check-btn">確認</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            const tbody = $("#calendar tbody");
            let currentDate = new Date();
            // console.log(currentDate)
            currentDate.setMonth(3);
            currentDate.setDate(1); 
            let totalOrders = [];
            let everyOrders = {};
            let totalOrdersJson = $("#totalOrders").val();
            if (totalOrdersJson) {
                totalOrders = JSON.parse(totalOrdersJson);
            } 
            // console.log(totalOrders)

            //Handle Click
            function handleClick() {
                const clickedCell = $(this);
                const date = parseInt(clickedCell.text());
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth() + 1;
                const day = date;
                const formattedMonth = month < 10 ? `0${month}` : month;
                const formattedDay = day < 10 ? `0${day}` : day;
                const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;
                if (!everyOrders[clickedDay]) {
                    everyOrders[clickedDay] = 0;
                }

                if (!clickedCell.hasClass("clicked")) {
                    clickedCell.addClass("clicked").find("span").remove();
                    clickedCell.append("<span>✔️</span>");
                    everyOrders[clickedDay] = 1;
                    totalOrders.push(clickedDay);

                } else {
                    clickedCell.removeClass("clicked").find("span").remove();
                    // clickedCell.append("<span>❌</span>");
                    everyOrders[clickedDay] = 0;
                    // console.log(everyOrders[clickedDay])
                    if (everyOrders[clickedDay] === 0) {
                        const index = totalOrders.indexOf(clickedDay);
                        // console.log(index)
                        // cancelOrders.push(clickedDay)
                        if (index !== -1) {
                            totalOrders.splice(index, 1);
                            // console.log(totalOrders)
                        }
                    }
                }
            }


            //Handle Day of Week Click
            function handleDayOfWeekClick(dayIndex) {
                var tds = document.querySelectorAll("#calendar tbody tr td:nth-child(" + (dayIndex + 1) + ")");
                tds.forEach(function(td) {
                    const date = parseInt($(td).text());
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth() + 1;
                    const day = date;
                    const formattedMonth = month < 10 ? `0${month}` : month;
                    const formattedDay = day < 10 ? `0${day}` : day;
                    const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;
                    if (!everyOrders[clickedDay]) {
                        everyOrders[clickedDay] = 0;
                    }
                    if (day) {
                        if (!$(td).hasClass("clicked")) {
                            $(td).addClass("clicked").find("span").remove();
                            $(td).append("<span>✔️</span>");
                            everyOrders[clickedDay] = 1;
                            totalOrders.push(clickedDay);
                        } else {
                            $(td).removeClass("clicked").find("span").remove();
                            everyOrders[clickedDay] = 0;
                            // console.log(everyOrders[clickedDay])
                            if (everyOrders[clickedDay] === 0) {
                                const index = totalOrders.indexOf(clickedDay);
                                if (index !== -1) {
                                    totalOrders.splice(index, 1);
                                }
                            }
                        }
                    }
                });
            }

            //Render Calendar
            function renderCalendar() {
                tbody.html("");
                const firstDayOfMonth = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth(),
                    1
                ).getDay();
                const daysInMonth = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() + 1,
                    0
                ).getDate();
                const japaneseMonths = [
                    "1月",
                    "2月",
                    "3月",
                    "4月",
                    "5月",
                    "6月",
                    "7月",
                    "8月",
                    "9月",
                    "10月",
                    "11月",
                    "12月",
                ];
                $("#monthYear").text(
                    `${japaneseMonths[currentDate.getMonth()]} ${currentDate.getFullYear()}`
                );
                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = $("<tr></tr>");
                    for (let j = 0; j < 7; j++) {
                        const cell = $("<td></td>");
                        if ((i === 0 && j < firstDayOfMonth) || date > daysInMonth) {
                            cell.text("");
                            cell.css("cursor", "default");
                        } else {
                            cell.text(date);
                            const year = currentDate.getFullYear();
                            const month = currentDate.getMonth() + 1;
                            const day = date;
                            const formattedMonth = month < 10 ? `0${month}` : month;
                            const formattedDay = day < 10 ? `0${day}` : day;
                            const curDate = `${year}-${formattedMonth}-${formattedDay}`;
                            if (totalOrders.find((item) => {
                                    return item == curDate
                                })) {
                                cell.addClass("clicked");
                                cell.append("<span>✔️</span>");
                            }
                            cell.on("click", handleClick);
                            date++;
                            // if (new Date(curDate) <= new Date().setHours(47, 59, 59, 999)) {
                            //     cell.off("click");
                            //     cell.css("cursor", "not-allowed");
                            // }
                            // Disable click events for past days up to today
                            if (new Date(curDate) <= new Date().setHours(23, 59, 59, 999)) {
                                cell.off("click");
                                cell.css("cursor", "not-allowed");
                                cell.css("background-color", "#8f8484");
                                cell.css("color", "#FFF");
                            }

                            // Disable click event for the next day after 3 PM
                            if (currentDate.getHours() >= 15 && new Date(curDate) <= new Date().setHours(47, 59, 59, 999)) {
                                cell.off("click");
                                cell.css("cursor", "not-allowed");
                                cell.css("background-color", "#8f8484");
                                cell.css("color", "#FFF");
                            }
                            if (new Date(currentDate.getFullYear(), currentDate.getMonth(), date).toDateString() === new Date().toDateString()) {
                                cell.addClass("current-day");
                                cell.css("background-color", "red");
                                cell.css("color", "#FFF");
                            }
                        }
                        row.append(cell);
                    }
                    tbody.append(row);
                }
            }

            //Register orders for all days
            function registerAllOrders() {
                const daysInMonth = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() + 1,
                    0
                ).getDate();
                // totalOrders = [];
                for (let i = 1; i <= daysInMonth; i++) {
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth() + 1;
                    const day = i;
                    const formattedMonth = month < 10 ? `0${month}` : month;
                    const formattedDay = day < 10 ? `0${day}` : day;
                    const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;
                    everyOrders[clickedDay] = 1;
                    totalOrders.push(clickedDay);
                }
                renderCalendar();
            }

            //Cancel orders for all days
            function cancelAllOrders() {
                const daysInMonth = new Date(
                    currentDate.getFullYear(),
                    currentDate.getMonth() + 1,
                    0
                ).getDate();
                for (let i = 1; i <= daysInMonth; i++) {
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth() + 1;
                    const day = i;
                    const formattedMonth = month < 10 ? `0${month}` : month;
                    const formattedDay = day < 10 ? `0${day}` : day;
                    const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;

                    everyOrders[clickedDay] = 0;
                    // cancelOrders.push(clickedDay);
                    const index = totalOrders.indexOf(clickedDay);
                    totalOrders.splice(index, 1);
                }
                renderCalendar();
            }


            //Prev
            function prevMonth() {
                if (currentDate.getMonth() !== 3 || currentDate.getFullYear() > new Date().getFullYear()) {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    renderCalendar();
                }
            }

            //Next
            function nextMonth() {
                if (currentDate.getMonth() !== 2 || currentDate.getFullYear() < new Date().getFullYear() + 1) {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    renderCalendar();
                }
            }


            $("#prevBtn").on("click", prevMonth);
            $("#nextBtn").on("click", nextMonth);
            $("#every-use").on("click", registerAllOrders);
            $("#every-cancel").on("click", cancelAllOrders);

            $("th[data-day]").on("click", function() {
                const dayIndex = $(this).data("day");
                handleDayOfWeekClick(dayIndex);
            });

            $(".close_btn").click(function() {
                $("#check-modal").hide();
            })

            $(".cancel_btn").click(function() {
                $("#check-modal").hide();
            })

            document.querySelector("#order-save").addEventListener('click', () => {
                $("#check-modal").show();
                $("#check-btn").click(function() {
                    $("#check-modal").hide();
                    // console.log(totalOrders)
                    // Send a POST request for each element
                    $.post("{{ route('home.store') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "order_date": totalOrders
                    }, function(data) {
                        var resp = data.info;
                        if (data.status == 200) {
                            toastr.success(data.message);
                            window.location.reload(true);
                            totalOrders = data.orders;
                        } else if (data.status == 401) {
                            toastr.error(data.message);
                        }
                    }, 'json').catch((error) => {
                        toastr.error("エラーが発生しました。");
                    });
                })
            });

            renderCalendar();
        });
    </script>
@endsection
