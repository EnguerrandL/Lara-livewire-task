<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];


    public function imgUrl(): string
    {
        if (Str::contains($this->images, 'placeholder')) {
            return $this->url; 
        } else {
           
            return asset(Storage::disk('public')->url($this->url));
        }
    }

}
