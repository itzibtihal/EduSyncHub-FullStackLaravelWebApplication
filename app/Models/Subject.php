<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{

    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description'];

    
    public function courses(){
        return $this->hasMany(Course::class);
    }
    
    public function levelSectionSpecialities()
    {
        return $this->hasMany(LevelSectionSpeciality::class);
    }

    public function levels(){
        return $this->belongsToMany( Level::class,LevelSectionSpeciality::class )->whereNull('level_section_speciality.deleted_at');
    }

    public function level(){
        return $this->hasOneThrough( Level::class,LevelSectionSpeciality::class,
            'subject_id', 'id', "id", "level_id")->distinct("id")->whereNull('level_section_speciality.deleted_at');
    }

    public function speciality(){
        return $this->hasOneThrough( Speciality::class,LevelSectionSpeciality::class,
            'subject_id', 'id', "id", "speciality_id")->whereNull('level_section_speciality.deleted_at');
    }

    public function specialities(){
        return $this->belongsToMany( Speciality::class,LevelSectionSpeciality::class)
            ->whereNull('level_section_speciality.deleted_at');
    }

    public function getCompleteNameAttribute(){
        return  $this['name'];
        if(!$this->level){
            return $this->name;
        }
        return $this->name.' ('.$this->level->complete_name.')';
    }

}

