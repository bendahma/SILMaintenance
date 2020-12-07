<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Machine;

class Panne extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function machines(){
        return $this->belongsTo(Machine::class);
    }
}
