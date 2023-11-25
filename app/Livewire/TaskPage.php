<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskAssignement;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskPage extends Component
{

    #[Title('Gestion des tâches')]
    #[Layout('home')]

    #[Validate('required', message: 'Name required')]
    public $taskName;

    #[Validate('required', message: 'Both dates required')]
    public $taskStartDate;

    #[Validate('required', message: 'Both dates required')]
    public $taskLimitDate;

    #[Validate('sometimes', message: 'You must pick at least one user')]
    public $taskAssignedUsers = [];

    #[Validate('required', message: 'The have the right to know what to do....')]
    public $taskDescription;



    public function store()
    {

        $this->validate();

        $newTask = Task::create([
            'name' => $this->taskName,
            'date_start' => $this->taskStartDate,
            'date_limit' => $this->taskLimitDate,
            'description' => $this->taskDescription
        ]);

        foreach ($this->taskAssignedUsers as $userId) {

           
              TaskAssignement::create([
                'user_id' => $userId,
                'task_id' => $newTask->id,
            ]);
        }
      

        $this->reset();
    }


    public function delete($id)
    {

        Task::find($id)->delete();

        

        $this->dispatch(
            'alert',
            icon: 'error',
            type : 'success',
            position: 'center',
            title: 'Task deleted',
            text: 'Task deleted with success'

    );
    }



    public function render()
    {
        return view('livewire.task-page', [
            'tasks' => Task::all(),
            'users' => User::all()
        ]);
    }
}
