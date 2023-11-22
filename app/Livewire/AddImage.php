<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddImage extends Component
{


    use WithFileUploads;


    #[Rule('sometimes')]
    public $url;

    public function addImage(){

        $validated = $this->validate();
    
        
        if($this->url){
           $path  =  $this->url->store('uploads',  'public');
           $validated['url'] = $path ;
          

           Image::create([
            'url' => $path,
           ]);
        }
    }


    public function render()
    {
        return view('livewire.add-image', [
            'images' => Image::all(),
            'url' => $this->url
        ]);
    }
}
