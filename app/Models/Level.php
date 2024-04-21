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
    
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'level_speciality')
            ->distinct('speciality_id');
    }
    
    public function sections(){
        return $this->belongsToMany(Section::class, LevelSectionSpeciality::class)->whereNull('level_section_speciality.deleted_at');;
    }

    public function levelSpecialities()
{
    return $this->belongsToMany(Speciality::class, 'level_speciality');
}
    
    
    public function getCompleteNameAttribute()
    {
        return $this->name.' ('.$this->cycle->name.')';
    }

    public function getSpecialitiesCountAttribute()
    {
        return $this->specialities;
    }
    
}
    

   
    

