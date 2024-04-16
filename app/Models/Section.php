<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory,SoftDeletes;
    

    protected $fillable = ['name'];

    // public function levelSectionSpecialities()
    // {
    //     return $this->hasMany(LevelSectionSpeciality::class);
    // }

    public function levelSectionSpeciality(){
        return $this->hasMany(LevelSectionSpeciality::class, 'section_id', 'id')->whereNull('level_section_speciality.deleted_at');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'section_user');
    }

    public function level(){
        return $this->belongsToMany(Level::class,
            LevelSectionSpeciality::class
        )->distinct('level_id')->whereNull('level_section_speciality.deleted_at');
    }


    public function speciality(){
        return $this->belongsToMany(Speciality::class,
            LevelSectionSpeciality::class
        )->distinct('speciality_id')->whereNull('level_section_speciality.deleted_at');
    }
    

    public function getLevelAttribute(){
        return $this->belongsToMany(Level::class,
            LevelSectionSpeciality::class
            )->distinct('level_id')->with('cycle')->whereNull('level_section_speciality.deleted_at')->first();
    }

    public function getSpecialityAttribute(){
        return $this->belongsToMany(Speciality::class,
            LevelSectionSpeciality::class
            )->distinct('speciality_id')->whereNull('level_section_speciality.deleted_at')->first();
    }


    // public function events(){
    //     return $this->belongsToMany(Event::class, 'event_section');
    // }

    public function subjects(){

        return $this->belongsToMany(Subject::class,
            LevelSectionSpeciality::class)
            ->whereNull('level_section_speciality.deleted_at');
    }

    public function getCompleteNameAttribute(){
        if( $this->level && $this->level->cycle){
            $returnname = $this->name.' ('.$this->level->name.' '.$this->level->cycle->name.')';
           if($this->speciality){
               if(strtolower($this->speciality->name) != 'default'){
                   $returnname = $returnname.' - '.$this->speciality->name;
               }
           }
            return $returnname;
        }
        return $this->name ;
    }

}
