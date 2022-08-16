<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/fullcalendar.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css">
    <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/fullcalendar.min.js"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales-all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/google-calendar/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/luxon/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment-timezone/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/rrule/main.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <style>

        .fc-event{font-size:1em; padding-top: 25px; padding-left:15px;}
        .fc-time-grid-event{
            background-color: rgba(25, 155, 181, 0.48);
            border:none;
        }
        .fc-day{border: 'none'}
        /* .fc-event{width:100%}
        .fc-event{'white-space': 'initial'}
        .fc-month-button{
            'background': '#199bb5',
            'color': 'white',
            'border': 'none'
        }
        .fc-agendaWeek-button{
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
  
        }
        .fc-agendaDay-button{
            'background': '#fff',
            'border':'1px solid #199bb5',
            'color': '#199bbg',
        } */

        /* .fc-day-number{
            'float':'none',
            'margin':'0 auto'
        } */

        .fc-prev-button{
            background : #199bb5;
            border:1px solid #199bb5;
            color: #199bbg;
        }

        .fc-next-button{
            background: #199bb5;
            border:1px solid #199bb5;
            color: #199bbg;
        }

        .fc-today{
            background: #E4F1F4 !important;
        }

        .fc-widget-content{
            height:80px !important;    
        }
        
    </style>

    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('practitioner.availability')}}"  aria-haspopup="true" aria-expanded="false">
                                Availability
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('practitioner.booking')}}"  aria-haspopup="true" aria-expanded="false">
                                Booking
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('services')}}"  aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')
</body>
</html>
