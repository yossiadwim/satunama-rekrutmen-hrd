<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->hasOne(User::class,'user_id','user_id');
    }

    public function profil(){
        return $this->hasOne(Profil::class,'profil_id','id');
    }

}
