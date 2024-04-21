<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = ['name'];

    public function specialityParents()
    {
        return $this->hasMany(SpecialityParent::class);
    }

    public function levelSectionSpecialities()
    {
        return $this->hasMany(LevelSectionSpeciality::class);
    }
    public function level(){
        return $this->belongsToMany(Level::class,
            'level_section_speciality')
            ->distinct('level_id')
            ->whereNull('level_section_speciality.deleted_at');
           
    }

    // public function sections(){
    //     return $this->belongsToMany(Section::class,
    //         LevelSectionSpeciality::class)->withPivot('level_id')
    //         ->distinct('subject_id')
    //         ->whereNull('level_section_speciality.deleted_at');
    // }

    public function sections()
{
    return $this->belongsToMany(Section::class, 'speciality_section');
}


public function specialities()
{
    return $this->belongsToMany(Section::class, 'speciality_section');
}
    
}
