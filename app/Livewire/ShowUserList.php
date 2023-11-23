<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowUserList extends Component
{

    public $search;
    public $mountValue = ""; 

    public function mount($mountValue){

        $this->mountValue  = $mountValue;
    }


    // Pour accèder à la propriété, utilisation $this-> dans la blade
    #[Computed()]
    public function users()
    {
        return User::latest()
        ->where('name', 'like', "%{$this->search}%" )
        ->orWhere('created_at', 'like', "%{$this->search}%")
        ->get();
    }



    #[On('user-added')]
    public function updateList($user = null)
    {
    }

    public function render()
    {
        return view('livewire.show-user-list');
    }
}
