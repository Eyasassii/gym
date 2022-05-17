@extends('backend.layouts.app')

@section('title', __('Courses'))

@push('after-styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Courses')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                href="#"
                data-toggle="modal"
                data-target="#create-course-modal"
                :text="__('Create Course')"
            />
            <div class="modal fade" id="create-course-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="course-title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="course-start" class="col-form-label">Start time:</label>
                                <input type="datetime-local" class="form-control" id="start">
                            </div>
                            <div class="form-group">
                                <label for="course-start" class="col-form-label">End time:</label>
                                <input type="datetime-local" class="form-control" id="end">
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="create-course-btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="body">
            <table class="table table-bordered" id="courses">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Course</th>
                        <th>Start time</th>
                        <th>End time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ Carbon\Carbon::parse($course->start)->format('Y-m-d H:i') }}</td>
                        <td>{{ Carbon\Carbon::parse($course->end)->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection

@push('after-scripts')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#courses').DataTable();

            $('#create-course-btn').on('click', function () {
                $.ajax({
                    url: '/admin/course',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        title: $('#title').val(),
                        start: $('#start').val(),
                        end: $('#end').val()
                    }
                }).done(function (res) {
                    if (res.success) {
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            html: `Course <b>${$('#title').val()}</b> was successfully created`
                        }).then(function () {
                            window.location.reload()
                        })
                    } else {
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            html: `Unable to create course`
                        })
                    }
                })
            })
        });
    </script>
@endpush