<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    
    protected $fillable = [
        'user_id',
        'task_id',
        'group_id',
        'content',
    ];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
