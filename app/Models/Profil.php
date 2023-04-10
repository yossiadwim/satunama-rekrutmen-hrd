<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function pengalamanKerja(){
        return $this->hasMany(PengalamanKerja::class);
    }

    public function pendidikan(){
        return $this->hasMany(PengalamanKerja::class);
    }

    
}   