<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddImage extends Component
{


    use WithFileUploads;


    #[Rule('sometimes')]
    public $url;

    #[Rule('sometimes')]
    public $name; 

    public function addImage(){

    //   sleep(2);

        $validated = $this->validate();
    
      $user =  User::create($this->validateOnly('name'));

        if($this->url){
           $path  =  $this->url->store('uploads',  'public');
           $validated['url'] = $path ;
          

           Image::create([
            'url' => $path,
           ]);
        }

        $this->reset('url');

        session()->flash('alert', 'Image ajoutée avec succès avec succées');

        $this->dispatch('user-added', $user);
       
      
    }


  

    public function delete($id){

        Image::find($id)->delete();

        session()->flash('alert', 'Image supprimée avec succées');
     
        
    }


    public function render()
    {
        return view('livewire.add-image', [
            'images' => Image::all(),
            'url' => $this->url
        ]);
    }
}
