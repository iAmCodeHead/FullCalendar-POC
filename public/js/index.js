document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');


    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'timeGrid' ],
      defaultView: 'timeGridWeek',
      selectable: true,
      selectHelper: true,
      displayEventTime:false,
      eventSources: [
        {
          url: '/practioner/fetch/availability', // use the `url` property
        }
    
      ],
      eventClick:  function(event, jsEvent, view) {
        $('#modalTitle').html(event.title);
        $('#modalBody').html(event.description);
        $('#eventUrl').attr('href',event.url);
        $('#calendarModal').modal();
    },
    });
    
    calendar.render();

    $('.fc-event').css('font-size', '10px');
    $('.fc-day').css('border', 'none');
    $('.fc-event').css('width', '80%');
    $('.fc-event').css('white-space', 'initial')
    $('.fc-time-grid-event').css('background-color', 'red !important')
  
  });