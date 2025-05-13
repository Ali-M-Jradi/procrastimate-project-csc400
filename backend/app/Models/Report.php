<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    public function userId(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }

    public function userSubmittedBy(){
        return $this->belongsTo(User::class,'submitted_by');
    }
}
