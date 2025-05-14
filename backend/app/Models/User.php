<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function notificationSent() {
        return $this->hasMany(Nudge::class, 'from_user_id');
    }

    public function notificationReceived() {
        return $this->hasMany(Nudge::class, 'to_user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function reportSubmittedBy(){
        return $this->hasMany(Report::class, 'submitted_by');
    }

    public function group(){
        return $this->belongsToMany(Group::class,'group_user','user_id');
    }

    public function reportAsSubject(){
        return $this->hasMany(Report::class,'as_subject');
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isCoach() {
        return $this->role === 'coach';
    }
}
