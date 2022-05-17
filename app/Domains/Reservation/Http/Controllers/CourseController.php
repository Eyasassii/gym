<?php

namespace App\Domains\Reservation\Http\Controllers;

use App\Domains\Reservation\Models\Course;
use Carbon\Carbon;

class CourseController
{

    public function index()
    {
        $courses = Course::select('id', 'title', 'start', 'end')->get();

        return view('backend.course.index', compact('courses'));
    }

    public function store()
    {
        $start = Carbon::parse(request()->input('start'));

        Course::create([
            'title' => request()->input('title'),
            'start' => $start->format('Y-m-d H:i:s'),
            'end' => $start->addHours(1)
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
