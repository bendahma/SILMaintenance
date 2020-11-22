<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
