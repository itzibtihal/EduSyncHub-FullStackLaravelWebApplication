<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialityParent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'speciality_parent';

    protected $fillable = ['speciality_id', 'parent_id'];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function parent()
    {
        return $this->belongsTo(Speciality::class, 'parent_id');
    }
}
