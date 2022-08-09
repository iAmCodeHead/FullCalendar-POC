
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
    moreLinkClick:"day",
    contentHeight: 'auto',
    expandRows:true,
    eventClick: function(info) {
        alert('Event: ' + info.event.id);
    },
    eventRender: function (event, element, view) {
        if( window.screen.width < 300 ) {
           $('.fc-event-title').hide();
           $('.fc-event-time').hide();
        }
    }
});
    calendar.render();
console.log(calendar.getEvents());
});