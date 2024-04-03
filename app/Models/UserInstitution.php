<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInstitution extends Model
{
    protected $table = 'user_institution'; // Assuming the table name is 'user_institution'

    protected $fillable = [
        'user_id',
        'institution_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
