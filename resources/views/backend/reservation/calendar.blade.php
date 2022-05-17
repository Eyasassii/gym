@extends('backend.layouts.app')

@push('after-styles')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet'/>

    <style>
        #calendar {
            padding: 10px;
            margin: 10px;
            width: 100%;
            height: 100%;
            background: white;
        }
    </style>
@endpush()

@section('content')
    <div id='calendar'></div>
@endsection

@prepend('after-scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        $(document).ready(function () {
            var courses = {{ Illuminate\Support\Js::from($courses) }};

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl,{
                    initialView: 'timeGridWeek',
                    selectable: true,
                    events: courses,
                    headerToolbar: {
                        left: 'prev,next',
                        center: 'title'
                    },
                    views: {
                        timeGridWeek: {
                            type: 'timeGrid',
                            duration: {days: 7}
                        }
                    },
                    eventClick: function(info) {
                        Swal.fire({
                            title: 'Make reservation',
                            html: `Would you like to make a reservation for <br/> <b>${info.event.title}</b> ?`,
                            icon: 'info',
                            showCancelButton: true,
                            confirmButton: 'Confirm'
                        }).then(result => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '/admin/reservation/make-reservation',
                                    type: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        course_id: info.event.id,
                                    }
                                }).done(function (res) {
                                    if (res.success) {
                                        Swal.fire({
                                            title: 'Success',
                                            icon: 'success',
                                            html: `You successfully made a reservation to <br/> <b>${info.event.title}</b>`
                                        })
                                    } else {
                                        Swal.fire({
                                            title: 'Error',
                                            icon: 'error',
                                            html: `You already have a reservation to <br /> <b>${info.event.title}</b>`
                                        })
                                    }
                                })
                            }
                        })
                    }
                })
            
            calendar.render()
        })
    </script>
@endprepend
