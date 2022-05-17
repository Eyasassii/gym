<?php

namespace App\Domains\Reservation\Http\Controllers;

use App\Domains\Reservation\Models\Course;
use App\Domains\Reservation\Models\Reservation;

class ReservationController
{

    public function index()
    {
        $courses = Course::select('id', 'title', 'start', 'end')->get();

        return view('backend.reservation.index', compact('courses'));
    }

    public function store()
    {
        $course = Course::find(request('course_id'));

        $anyMadeReservation = Reservation::where(['user_id' => auth()->id(), 'course_id' => request('course_id')])->count();

        if ($anyMadeReservation > 0) {
            return response()->json([
                'success' => false
            ]);
        } else {
            Reservation::create([
                'user_id' => auth()->id(),
                'course_id' => request('course_id')
            ]);

            return response()->json([
                'success' => true
            ]);
        }
    }
}
