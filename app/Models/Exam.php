<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title', 'cycle_id', 'level_id', 'speciality_id', 'section_id', 'subject_id', 'professor_id',
        'created_by', 'date', 'duration', 'base_note', 'comment'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'exam_user')->withPivot('result', 'base_note', 'comment', 'is_passed')->withTimestamps();
    }

    public function professor(){
        return $this->belongsTo(User::class, 'professor_id', 'id');
    }

     public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function results(){
        return $this->hasMany(ExamUser::class, 'exam_id', 'id');
    }
     
    public function cycle(){
        return $this->belongsTo(Cycle::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

}
