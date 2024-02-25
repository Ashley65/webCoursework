window.onload = function() {
    let currentWeekStart = new Date();
    currentWeekStart.setDate(currentWeekStart.getDate() - currentWeekStart.getDay());

    function highlightCurrentTime() {
        let now = new Date();
        let currentHour = now.getHours();
        let currentDay = now.getDay();

        if (currentHour >= 8 && currentHour <= 18) {
            let timetable = document.getElementById('timetable');
            let rows = timetable.getElementsByTagName('tr');

            let currentHourRow = rows[currentHour - 7];

            if (currentHourRow) {
                let cells = currentHourRow.getElementsByTagName('td');

                let currentCell = cells[currentDay];

                if (currentCell) {
                    currentCell.style.backgroundColor = '#0c7db1';
                    currentCell.style.color = '#ffffff';
                }
            }
        }
    }

    function populateTimetable() {
        let timetable = document.getElementById('timetable');
        timetable.innerHTML = '';

        let headerRow = document.createElement('tr');

        let cornerCell = document.createElement('th');
        cornerCell.textContent = '';
        headerRow.appendChild(cornerCell);

        for (let i = 0; i < 7; i++) {
            let date = new Date(currentWeekStart);
            date.setDate(date.getDate() + i);

            let cell = document.createElement('th');
            cell.textContent = date.toLocaleDateString('en', { weekday: 'short', day: 'numeric' });
            headerRow.appendChild(cell);
        }

        timetable.appendChild(headerRow);

        for (let hour = 8; hour <= 18; hour++) {
            let row = document.createElement('tr');

            let hourCell = document.createElement('td');
            hourCell.textContent = hour + ':00';
            row.appendChild(hourCell);

            for (let i = 0; i < 7; i++) {
                let cell = document.createElement('td');
                cell.textContent = '';
                row.appendChild(cell);
            }

            timetable.appendChild(row);
        }

        let weekRangeHeading = document.getElementById('week-range');
        let weekStart = new Date(currentWeekStart);
        let weekEnd = new Date(currentWeekStart);
        weekEnd.setDate(weekEnd.getDate() + 6);

        let options = { month: 'short', day: 'numeric' };
        let weekStartStr = weekStart.toLocaleDateString('en', options);
        let weekEndStr = weekEnd.toLocaleDateString('en', options);

        weekRangeHeading.textContent = `${weekStartStr} - ${weekEndStr}`;

        let yearHeading = document.getElementById('year-heading');
        yearHeading.textContent = currentWeekStart.getFullYear();

        highlightCurrentTime();
    }

    document.getElementById('prev-week').addEventListener('click', function() {
        currentWeekStart.setDate(currentWeekStart.getDate() - 7);
        populateTimetable();
    });

    document.getElementById('next-week').addEventListener('click', function() {
        currentWeekStart.setDate(currentWeekStart.getDate() + 7);
        populateTimetable();
    });

    document.getElementById('current-week').addEventListener('click', function() {
        currentWeekStart = new Date();
        currentWeekStart.setDate(currentWeekStart.getDate() - currentWeekStart.getDay());
        populateTimetable();
    });

    setInterval(highlightCurrentTime, 60000);

    populateTimetable();
};