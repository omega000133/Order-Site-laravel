$(document).ready(function () {
    const tbody = $("#calendar tbody");
    let currentDate = new Date();
    let totalOrders = [];
    let everyOrders = {};
    let ordersRegistered = false;

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
            everyOrders[clickedDay] += 1; 
            totalOrders.push(clickedDay); 
            return totalOrders;
        } else {
            clickedCell.removeClass("clicked").find("span").remove();
            clickedCell.append("<span>❌</span>");
            everyOrders[clickedDay] -= 1; 
            if (everyOrders[clickedDay] === 0) {
                const index = totalOrders.indexOf(clickedDay);
                if (index !== -1) {
                    totalOrders.splice(index, 1);
                }
            }
        }
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
            `${
                japaneseMonths[currentDate.getMonth()]
            } ${currentDate.getFullYear()}`
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
                    const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;
                    if (everyOrders[clickedDay] === 1) {
                        cell.addClass("clicked");
                        cell.append("<span>✔️</span>");
                        everyOrders[clickedDay] += 1; // Increment orders for the clicked day
                        totalOrders.push(clickedDay); // Push clicked day into totalOrders array
                    } else if (everyOrders[clickedDay] === 0) {
                        cell.removeClass("clicked");
                        cell.append("<span>❌</span>");
                        const index = totalOrders.indexOf(clickedDay);
                        if (index !== -1) {
                            totalOrders.splice(index, 1);
                        }
                    }
                    if (
                        new Date(
                            currentDate.getFullYear(),
                            currentDate.getMonth(),
                            date
                        ).toDateString() === new Date().toDateString()
                    ) {
                        cell.addClass("current-day");
                        cell.css("background-color", "red");
                        cell.css("color", "white");
                    }
                    cell.on("click", handleClick);
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
        for (let i = 1; i <= daysInMonth; i++) {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth() + 1;
            const day = i;
            const formattedMonth = month < 10 ? `0${month}` : month;
            const formattedDay = day < 10 ? `0${day}` : day;
            const clickedDay = `${year}-${formattedMonth}-${formattedDay}`;
            everyOrders[clickedDay] = 1;
        }
        renderCalendar();
        ordersRegistered = true;
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
        }
        renderCalendar();
        ordersRegistered = false;
    }

    //Prev
    function prevMonth() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    }

    //Next
    function nextMonth() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    }

    $("#prevBtn").on("click", prevMonth);
    $("#nextBtn").on("click", nextMonth);
    $("#every-use").on("click", function () {
        if (!ordersRegistered) {
            registerAllOrders();
        } else {
            cancelAllOrders();
        }
    });

    document.querySelector("#order-save").addEventListener('click', () => {
        console.log(totalOrders)
    })

    renderCalendar();

});
