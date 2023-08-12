<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description','image'];
    use HasFactory;




    public function subtasks() {
        return $this->hasMany(Subtask::class, 'task_id');
    }
}
