<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Machine;
use App\Models\DemandeTravail;
use App\Models\User;

class Panne extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function machines(){
        return $this->belongsTo(Machine::class);
    }

    public function demandetravail(){
        return $this->hasOne(DemandeTravail::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
