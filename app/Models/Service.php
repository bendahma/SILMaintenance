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

    public function chefService(){
        $personnel = Personnel::find($this->chef_service_id)->first();
        return $personnel != null ? $personnel : 'Chef service not defined';
    }
}
