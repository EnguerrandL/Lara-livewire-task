<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    
    public $perPage = 5;
    public $search = '';


    #[Title('Users management')]
    #[Layout('home')]
    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::search($this->search)->paginate($this->perPage),
        ]);
    }
}
