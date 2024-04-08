<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    protected $fillable = [
        'lastname',
        'firstname',
        'address',
        'dateofbirth',
        'phone',
        'isActive',
        'status', // Add 'status' to the fillable array
        'email',
        'cv_file',
        'avatar',
        'monthly_amount',
        'email_verified_at',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'user_institution');
    }

    
    public function sections(){
        return $this->belongsToMany(Section::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'created_by');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_user')->withPivot('result', 'base_note', 'comment', 'is_passed')->withTimestamps();
    }
}
