<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class group_tasks extends Model
{
    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function userAssignedBy(){
        return $this->belongsTo(User::class,'assigned_by');
    }
}
