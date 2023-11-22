<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Counter extends Component
{   
    // Règles de validation

    use WithPagination;

    #[Rule('required|min:2')]
    public $name;

    #[Rule('required|min:2')]
    public $email;

    #[Rule('required|min:2')]
    public $password;


    public function createUser(){

    $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);



     $this->reset(['name', 'email', 'password']);

     request()->session()->flash('success', 'User crée avec succès');
    }


   

    public function render()
    {
        return view('livewire.counter', [
            'users' => User::orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }
}
