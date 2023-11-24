<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{

   


    #[Title('Titre')]
    #[Layout('home')]
    public function render()
    {

        $tasks = Task::all();
        $events = [];
    
        foreach ($tasks as $task) {
            $events[] = [
                'id'          => $task->id,
                'task'        => $task->name,
                'date_start'  => $task->date_start,
                'date_limit'  => $task->date_limit,
                'completed'   => $task->completed,
            ];
        }
        
        return view('livewire.home-page', [
            'events' => $events
        ]);
    }
}
