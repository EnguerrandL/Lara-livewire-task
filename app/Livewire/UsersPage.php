<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UsersPage extends Component
{
    #[Title('Page users')]

    // Pour éviter de définir le layout, on peut publier le fichier config de livewire et définir le layout 
    #[Layout('layout.base')]

    public User $user;


    // public function mount(User $user){
    //     $this->user = $user;
    // }


    public function render()
    {
        return view('livewire.users-page');
    }
}
