<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamUser extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "exam_user";

    protected $fillable = ['user_id', 'exam_id', 'result', 'base_note', 'comment', 'is_passed'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}
