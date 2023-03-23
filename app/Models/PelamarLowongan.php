<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarLowongan extends Model
{
    use HasFactory;

    public function lowongan(){
        return $this->hasOne(Job::class,'id_lowongan','id');
    }
}
