<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'city'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_institution', 'institution_id', 'user_id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'institution_user');
    // }
}
