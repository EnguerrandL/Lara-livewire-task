<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Calendar extends Component
{

    #[Layout('home')]





    public function newEvent($name, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'name' => $name,
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'name' => 'required|min:1|max:40',
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        $event = Task::create(
            $validated
        );

        return $event->id;
    }

    public function updateEvent($id, $name, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        Task::findOrFail($id)->update($validated);
    }

    public function render()
    {
        $events = [];

        foreach (Task::all() as $event) {
            $events[] =  [
                'id' => $event->id,
                'title' => $event->name,

            ];
        }

        return view('livewire.calendar', [
            'events' => $events
        ]);
    }
}
