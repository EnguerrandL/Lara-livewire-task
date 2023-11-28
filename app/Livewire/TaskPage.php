<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\TaskAssignement;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskPage extends Component
{

    use WithFileUploads;



    #[Title('Task management')]
    #[Layout('home')]

    #[Validate('required', message: 'Name required')]
    public $taskName;

    #[Validate('required', message: 'Both dates required')]
    public $taskStartDate;

    #[Validate('required', message: 'Both dates required')]
    public $taskLimitDate;

    #[Validate('sometimes', message: 'You must pick at least one user')]
    public $taskAssignedUsers;

    #[Validate('required', message: 'The have the right to know what to do....')]
    public $taskDescription;

    #[Rule(['files.*' => 'image|max:2048|required'], message: '???')]
    public $files;

    public $search;
    public $editingTaskId;
    public $editingTaskName;




    public function store()
    {


        $this->validate();


        $newTask = Task::create([
            'name' => $this->taskName,
            'date_start' => $this->taskStartDate,
            'date_limit' => $this->taskLimitDate,
            'description' => $this->taskDescription,

        ]);


       
        if (is_array($this->files)) {
            $fileUrls = [];
        
            foreach ($this->files as $file) {
                $path = $file->store('files', 'public');
                $fileUrls[] = asset('storage/' . $path);
            }
        
           
            $newTask->update([
                'files' => json_encode($fileUrls)
            ]);
        }

        foreach ($this->taskAssignedUsers as $userId) {


            TaskAssignement::create([
                'user_id' => $userId,
                'task_id' => $newTask->id,
            ]);
        }   

        // json_decode($task->files); pour récup les urls 


        $this->reset();
    }

  

    public function updated($property){
        
        if ($property === 'taskName'){
          $this->taskName = strtoupper($this->taskName);
        }
    }

    public function edit($id)
    {
        $task = Task::find($id);

        $this->editingTaskId = $task->id;
        $this->editingTaskName = $task->name;
    }



    public function save()
    {

        $this->validateOnly('editingTaskName');

        Task::find($this->editingTaskId)->update([
            'name' => $this->editingTaskName
        ]);

        $this->cancelEdit();
    }

    public function cancelEdit()
    {

        $this->reset('editingTaskId', 'editingTaskName');
    }


    public function delete($id)
    {

        Task::find($id)->delete();



        $this->dispatch(
            'alert',
            icon: 'error',
            type: 'success',
            position: 'center',
            title: 'Task deleted',
            text: 'Task deleted with success'

        );
    }

    public function orderByDate()
    {

        Task::orderBy('created_at', 'ASEC');
    }



    public function render()
    {
        return view('livewire.task-page', [
            'tasks' => Task::orderBy('created_at', 'DESC')->where('name', 'like', "%{$this->search}%")->get(),
            'users' => User::all(),

        ]);
    }
}
