<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Personnel;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nom','prenom','dateNaissance','adresse','commune','wilaya','username','email','password'];

    protected $hidden = [ 'password','remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
