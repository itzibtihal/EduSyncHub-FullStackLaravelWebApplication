<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionCycle extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['institution_id', 'cycle_id'];

    public function school()
    {
        return $this->belongsTo(Institution::class);
    }

    public function cycle()
    { 
        return $this->belongsTo(Cycle::class);
    }
}
