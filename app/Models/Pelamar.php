<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pelamar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pelamar';
    public $timestamps = false;
    
    public function user(){
        return $this->hasOne(User::class,'id_pelamar','id');
    }

    public function pengalamanKerja(){
        return $this->hasMany(PengalamanKerja::class,'id_pelamar','id');
    }

    
    public function pendidikan(){
        return $this->hasMany(Pendidikan::class,'id_pelamar','id');
    }

    public function pelamarLowongan(){
        return $this->hasMany(PelamarLowongan::class,'id_pelamar','id');
    }

    public function referensi(){
        return $this->hasMany(Referensi::class,'id_pelamar','id');
    }
}
