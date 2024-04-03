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
}
