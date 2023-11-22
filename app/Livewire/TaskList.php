<?php

namespace App\Livewire;

use App\Models\Task;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TaskList extends Component
{

    use WithPagination;

    #[Rule('required|max:50')]
    public $name;

    public $search;



    public $editingTaskId;

    #[Rule('required|max:50')]
    public $editingName;
    
    public function create(){
        // $this->validate();
        $validated = $this->validateOnly('name');

        Task::create($validated );

        $this->reset('name');
        
        session()->flash('success', 'Tâche ajoutée avec succès');

        $this->resetPage();
    } 

    public function delete($id){


        try{
             Task::findOrfail($id)->delete();
        }catch(Exception $e){
            
            session()->flash('error', 'Echec de la suppression');
            return;
        }

       

     

        session()->flash('deleted', 'Tâche supprimée avec succès');
    }


    public function toggle($id){

        $task = Task::find($id);

        $task->completed = !$task->completed;
        $task->save();

    }

    public function edit ($id){

        $this->editingTaskId = $id;
        $this->editingName =  Task::find($id)->name;


    }

    public function update(){

        $this->validateOnly('editingName');

        Task::find($this->editingTaskId)->update([
            'name' => $this->editingName
        ]);

        $this->cancelEdit();
        
    }


    public function cancelEdit(){
        $this->reset('editingTaskId', 'editingName');

   
      
    }


    public function render()
    {
        return view('livewire.task-list', [
            'tasks' => Task::orderBy('created_at', 'DESC')->where('name', 'like', "%{$this->search}%" )->paginate(5),
        ]);
    }
}
