@extends('backend.layouts.app')

@push('after-styles')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet'/>

    <style>
        #calendar-container {
            width: 100%;
        }

        #calendar {
            padding: 10px;
            margin: 10px;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush()

@section('content')
    <div>
        <div id='calendar-container'>
            <div id='calendar'></div>
        </div>
    </div>
@endsection

@prepend('after-scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        $(document).ready(function () {

            var calendar = new FullCalendar.Calendar(
                document.getElementById('calendar'),
                {
                    initialView: 'dayGridMonth'
                }
            )

        })
    </script>
@endprepend
