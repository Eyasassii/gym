<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Reservation\Models\Course;
use Livewire\Component;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Course::select('id','title','start')->get();

        return  json_encode($events);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Course::create($input);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eventDrop($event, $oldCourse)
    {
        $eventdata = Course::find($event['id']);
        $eventdata->start = $event['start'];
        $eventdata->save();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $events = Course::select('id','title','start')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
