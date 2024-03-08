document.addEventListener("DOMContentLoaded", function() {
    const daysTag = document.querySelector(".days"),
        currentDate = document.querySelector(".current-date"),
        prevNextIcon = document.querySelectorAll(".icons span"),
        eventInput = document.getElementById('eventInput'),
        confirmButton = document.getElementById('addEvent'),
        eventsContainer = document.querySelector('.events');

    let date = new Date(),
        currYear = date.getFullYear(),
        currMonth = date.getMonth(),
        events = JSON.parse(localStorage.getItem('events')) || {},
        selectedDate = new Date();

    const months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];

    const renderCalendar = () => {
        let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
            lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
            lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
        let liTag = "";

        for (let i = firstDayofMonth; i > 0; i--) {
            liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
        }

        for (let i = 1; i <= lastDateofMonth; i++) {
            let isSelectedDate = selectedDate && i === selectedDate.getDate() && currMonth === selectedDate.getMonth() && currYear === selectedDate.getFullYear();
            let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear();
            let hasEvent = events[`${currYear}-${currMonth + 1}-${i}`] && events[`${currYear}-${currMonth + 1}-${i}`].length > 0 ? " has-event" : "";
            liTag += `<li class="${isToday ? 'active' : ''}${isSelectedDate ? ' clicked-date' : ''}${hasEvent}" id="date-${i}">${i}</li>`;
        }

        for (let i = lastDayofMonth; i < 6; i++) {
            liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
        }
        currentDate.innerText = `${months[currMonth]} ${currYear}`;
        daysTag.innerHTML = liTag;

        const dateElements = document.querySelectorAll('.days li:not(.inactive)');
        dateElements.forEach(dateElement => {
            dateElement.addEventListener('click', function() {
                dateElements.forEach(el => el.classList.remove('clicked-date'));
                this.classList.add('clicked-date');
                selectedDate = new Date(currYear, currMonth, parseInt(this.textContent));
                displayEventsForDate(selectedDate.getDate());
            });
        });
    }
    renderCalendar();

    displayEventsForDate(selectedDate.getDate());

    prevNextIcon.forEach(icon => {
        icon.addEventListener("click", () => {
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

            if(currMonth < 0 || currMonth > 11) {
                date = new Date(currYear, currMonth, new Date().getDate());

                currYear = date.getFullYear();
                currMonth = date.getMonth();
            } else {
                date = new Date();
            }
            renderCalendar();
        });
    });

    confirmButton.addEventListener('click', function() {
        const eventText = eventInput.value;
        if (eventText && selectedDate) {
            const selectedDateKey = `${selectedDate.getFullYear()}-${selectedDate.getMonth() + 1}-${selectedDate.getDate()}`;
            if (!events[selectedDateKey]) {
                events[selectedDateKey] = [];
            }
            events[selectedDateKey].push(eventText);
            localStorage.setItem('events', JSON.stringify(events));
            displayEventsForDate(selectedDate.getDate());
            eventInput.value = '';
        }
    });

    eventInput.addEventListener('keypress', function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            confirmButton.click();
        }
    });

    function displayEventsForDate(date) {
        const eventElements = eventsContainer.querySelectorAll('.event');
        eventElements.forEach(eventElement => {
            eventsContainer.removeChild(eventElement);
        });

        const eventsForDate = events[`${currYear}-${currMonth + 1}-${date}`] || [];
        if (eventsForDate.length > 0) {
            const dateElement = document.getElementById(`date-${date}`);
            if (dateElement) {
                dateElement.classList.add('has-event');
            }
        }

        eventsForDate.forEach((eventText, index) => {
            const eventElement = document.createElement('div');
            eventElement.classList.add('event');
            eventElement.textContent = eventText;

            const deleteButton = document.createElement('span');
            deleteButton.classList.add('delete-event');
            deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
            deleteButton.addEventListener('click', function() {
                const eventIndex = eventsForDate.indexOf(eventText);
                if (eventIndex > -1) {
                    eventsForDate.splice(eventIndex, 1);
                }

                localStorage.setItem('events', JSON.stringify(events));

                eventsContainer.removeChild(eventElement);

                if (eventsForDate.length === 0) {
                    const dateElement = document.getElementById(`date-${selectedDate.getDate()}`);
                    if (dateElement) {
                        dateElement.classList.remove('has-event');
                    }
                }
            });
            eventElement.appendChild(deleteButton);

            if (index === 0) {
                eventElement.style.marginTop = '-460px';
            }
            eventsContainer.appendChild(eventElement);
        });
    }
});
