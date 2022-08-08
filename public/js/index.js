
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'timeGridWeek,dayGridMonth,timeGridDay',
    },
    events: '/practioner/fetch/booking',
    contentHeight: 'auto',
    expandRows:true,
});
    calendar.render();
console.log(calendar.getEvents());
});