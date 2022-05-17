<?php

use App\Domains\Reservation\Http\Controllers\ReservationController;
use App\Domains\Reservation\Http\Controllers\CourseController;
use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::group([
    'prefix' => 'reservation',
    'as' => 'reservation.',
//    'middleware' => 'role:'.config('boilerplate.access.reservation.user'),
], function () {
    Route::get('/', [ReservationController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Reservations'), route('admin.reservation.index'));
        });

    Route::post('make-reservation', [ReservationController::class, 'store']);
});

Route::group([
    'prefix' => 'course',
    'as' => 'course.',
//    'middleware' => 'role:'.config('boilerplate.access.reservation.user'),
], function () {
    Route::get('/', [CourseController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Courses'), route('admin.course.index'));
        });

    Route::post('', [CourseController::class, 'store']);
});
