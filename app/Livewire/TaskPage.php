<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TaskPage extends Component
{

    #[Title('Gestion des tâches')] 
    #[Layout('home')]

   


    public function render()
    {
        return view('livewire.task-page', [
            'tasks' => Task::all(),
        ]);
     
    }
}
