<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'cycle_id'];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function levelSectionSpecialities()
    {
        return $this->hasMany(LevelSectionSpeciality::class);
    }
}
