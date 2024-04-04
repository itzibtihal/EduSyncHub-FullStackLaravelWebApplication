<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelSectionSpeciality extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['speciality_id', 'level_id', 'section_id', 'subject_id','cycle_id'];
    protected $table = 'level_section_speciality';


    // public function speciality()
    // {
    //     return $this->belongsTo(Speciality::class, 'speciality_id');
    // }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function cycle()
    { 
        return $this->belongsTo(Cycle::class, 'cycle_id'); 
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function getSpecialityName()
    {
        if ($this->relationLoaded('speciality')) {
            return $this->speciality->name;
        }
        return $this->speciality()->first()->name;
    }
}
