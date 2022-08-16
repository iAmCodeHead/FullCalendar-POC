@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 shadow p-5" id="calendar">

            </div>
            <div class="col-md-4" id="calendar2">

            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var booking = @json($booking);

        $('#calendar').fullCalendar({
            defaultView: 'agendaDay',
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'agendaDay,agendaWeek',
            },
            events: booking,
            selectable: true,
            selectHelper: true,
        })

        $('#calendar2').fullCalendar({
            // defaultView: 'month',
            header: {
                right: 'prev, next',
                left: 'title',
                // right: '',
            },
            events: booking,
            selectable: true,
            selectHelper: true,
        })

        $('.fc-event').css('font-size', '10px');
        $('.fc-day').css('border', 'none');
        $('.fc-event').css('width', '80%');
        $('.fc-event').css('white-space', 'initial')
        $('.fc-month-button').css({
            'background': '#199bb5',
            'color': 'white',
            'border': 'none'
        })
        $('.fc-agendaWeek-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
  
        })
        $('.fc-agendaDay-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-day-number').css({
            'float':'none',
            'margin':'0 auto'
        })

        $('.fc-prev-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-next-button').css({
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        })

        $('.fc-today').css({
            'background': '#E4F1F4',
        })

        $('.fc-widget-content').css({
            'height':'80'
        })


    });
</script>
@endsection