<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class group_tasks extends Model
{
    protected $fillable = [
        'group_id',
        'title',
        'description',
        'assigned_by',
        'due_date',
    ];

    
    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function userAssignedBy(){
        return $this->belongsTo(User::class,'assigned_by');
    }
}
