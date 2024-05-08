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
        @if (!empty($totalOrders))
            <input type="hidden" id="totalOrders" value="{{ json_encode($totalOrders) }}">
        @else
            <input type="hidden" id="totalOrders" value="[]">
        @endif
        @if (!empty($restDays))
            <input type="hidden" id="restDays" value="{{ json_encode($restDays) }}">
        @else
            <input type="hidden" id="restDays" value="[]">
        @endif
        @if (!empty($susDays))
            <input type="hidden" id="susDays" value="{{ json_encode($susDays) }}">
        @else
            <input type="hidden" id="susDays" value="[]">
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
                                <p>15時を過ぎると翌日のご注文について変更することはできません。</p>
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
            var href = window.location.href;

            function getParameterByName(name, url) {
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            if (href.includes('gid') && href.includes('god')) {
                var payment_num = getParameterByName('gid', href);
                var order_num = getParameterByName('god', href);

                //Register card number and order number in db
                $.post("{{ route('user.store') }}", {
                    "_token": $('meta[name="csrf_token"]').attr('content'),
                    "payment_num": payment_num,
                    "order_num": order_num
                }, function(data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                    } else if (data.status == 401) {
                        toastr.error("エラーが発生しました。");
                    }
                }, 'json').catch((error) => {
                    toastr.error("エラーが発生しました。");
                });
            }


            const tbody = $("#calendar tbody");
            let currentDate = new Date();
            // console.log(currentDate)
            // currentDate.setMonth(3);
            // currentDate.setDate(1);
            let totalOrders = [];
            let everyOrders = {};
            let totalOrdersJson = $("#totalOrders").val();
            let restDaysJson = $("#restDays").val();
            let susDaysJson = $("#susDays").val();
            if (totalOrdersJson) {
                totalOrders = JSON.parse(totalOrdersJson);
            }
            if (restDaysJson) {
                restDays = JSON.parse(restDaysJson);
            }
            if (susDaysJson) {
                susDays = JSON.parse(susDaysJson);
            }

            function getMaxDisableDate() {
                const currentDate = new Date();
                const currentHour = currentDate.getHours();

                // Set maxDisableDate based on current time
                let maxDisableDate;

                if (currentHour < 15) {
                    // If current time is before 15:00 (3:00 PM)
                    maxDisableDate = currentDate.toISOString().split('T')[0];
                } else {
                    // If current time is after or at 15:00 (3:00 PM)
                    const tomorrow = new Date(currentDate);
                    tomorrow.setDate(currentDate.getDate() + 1);
                    maxDisableDate = tomorrow.toISOString().split('T')[0];
                }
                return maxDisableDate;
            }

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
                    everyOrders[clickedDay] = 0;
                    if (everyOrders[clickedDay] === 0) {
                        const index = totalOrders.indexOf(clickedDay);
                        if (index !== -1) {
                            totalOrders.splice(index, 1);
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
                        if (!(dayIndex === 0 || dayIndex === 6 || (restDays && restDays.includes(
                                clickedDay)) || (susDays && susDays.includes(clickedDay)))) {
                            if (!$(td).hasClass("clicked")) {
                                $(td).addClass("clicked").find("span").remove();
                                $(td).append("<span>✔️</span>");
                                everyOrders[clickedDay] = 1;
                                totalOrders.push(clickedDay);
                            } else {
                                $(td).removeClass("clicked").find("span").remove();
                                everyOrders[clickedDay] = 0;
                                if (everyOrders[clickedDay] === 0) {
                                    const index = totalOrders.indexOf(clickedDay);
                                    if (index !== -1) {
                                        totalOrders.splice(index, 1);
                                    }
                                }
                            }
                        }
                    }
                });
            }

            //Render Calendar
            function renderCalendar() {
                console.log(totalOrders)
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

                const maxDisableDate = getMaxDisableDate();

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

                            const dayOfWeek = new Date(year, month - 1, day).getDay();
                            if (dayOfWeek === 0 || dayOfWeek === 6) {
                                cell.append("<span style='color: red'>休</span>");
                                cell.css("cursor", "not-allowed");
                            } else {
                                if (restDays && restDays.includes(curDate)) {
                                    cell.append("<span style='color: red'>休</span>");
                                    cell.css("cursor", "not-allowed");

                                } else if (susDays && susDays.includes(curDate)) {
                                    cell.append("<span>❌</span>");
                                    cell.css("cursor", "not-allowed");
                                } else if (curDate <= maxDisableDate) {
                                    cell.css("cursor", "not-allowed");
                                } else {
                                    // Enable ordering for regular days
                                    const currentDate = new Date();
                                    const currentDay = currentDate.getDay();
                                    const currentHour = currentDate.getHours();
                                    cell.on("click", handleClick);
                                }
                            }
                            // cell.on("click", handleClick);
                            date++;
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
                    // Check if it's not a weekend or rest day before registering the order
                    if (!((new Date(year, month - 1, day).getDay() === 0 || new Date(year, month - 1, day)
                                .getDay() === 6) || (restDays && restDays.includes(clickedDay)) || susDays &&
                            susDays
                            .includes(clickedDay))) {
                        everyOrders[clickedDay] = 1;
                        totalOrders.push(clickedDay);
                    }
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
                    const myOrders = new Set(totalOrders);
                    const ordersArray = Array.from(myOrders); 
                    // console.log(myOrders)
                    $.post("{{ route('home.store') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "order_date": ordersArray
                    }, function(data) {
                        var resp = data.info;
                        if (data.status == 200) {
                            toastr.success(data.message);
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 2000);
                            totalOrders = data.orders;
                        }else if (data.status == 401) {
                            toastr.error(data.message);
                        }
                    }, 'json').catch((error) => {
                        toastr.error("申し訳ございませんが、クレジットカード情報の登録がされていないため再度、会員登録をお願いします。");

                        setTimeout(() => {
                            window.location.href = '/';
                        }, 2000); 
                    });
                })
            });

            renderCalendar();
        });
    </script>
@endsection
