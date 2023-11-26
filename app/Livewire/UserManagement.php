<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserManagement extends Component
{

    #[Title('Users management')]
    #[Layout('home')]
    public function render()
    {
        return view('livewire.user-management');
    }
}
