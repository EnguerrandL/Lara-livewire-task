<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignement extends Model
{
    use HasFactory;


public function task(){
    $this->belongsTo(Task::class);
}


public function user(){

    $this->belongsToMany(User::class);
}

}
