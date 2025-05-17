<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

}
