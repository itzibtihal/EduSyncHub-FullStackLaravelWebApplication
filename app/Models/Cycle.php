<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycle extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = ['name'];

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function schoolCycles()
    {
        return $this->hasMany(InstitutionCycle::class);
    }

    // public function specialities(){

    //     return $this->belongsToMany(Speciality::class);
    //         // 'level_section_speciality')
    //         // ->distinct('speciality_id')
    //         // ->whereNull('level_section_speciality.deleted_at
    // }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'level_section_speciality')
            ->withPivot('level_id', 'section_id', 'subject_id')
            ->using(LevelSectionSpeciality::class)
            ->as('level_section_speciality')
            ->withTimestamps();
    }
}
