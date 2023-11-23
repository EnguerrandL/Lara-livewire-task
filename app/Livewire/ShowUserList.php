<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowUserList extends Component
{

    #[On('user-added')]
    public function updateList($user = null)
    {
    }

    public function render()
    {
        return view('livewire.show-user-list', [
            'users' => User::latest()->get(),
        ]);
    }
}
