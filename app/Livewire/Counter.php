<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Counter extends Component
{


    public $name;
    public $email;
    public $password;


    public function createUser(){


        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);


    }


   

    public function render()
    {
        return view('livewire.counter', [
            'users' => User::orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
