<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSpeciality extends Model
{
    use HasFactory;
    protected $table = 'level_speciality';

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
