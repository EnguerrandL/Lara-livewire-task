<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersPage extends Component
{

    #[Layout('layout.base')]
    public function render()
    {
        return view('livewire.users-page');
    }
}
