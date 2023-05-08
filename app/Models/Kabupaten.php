<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    public function provinsi()
    {
        return $this->hasOne(Provinsi::class,'id_provinsi','id_provinsi');
    }
}
