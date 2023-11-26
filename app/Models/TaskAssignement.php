<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAssignement extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'task_id', 'date_end'];

   
    
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
