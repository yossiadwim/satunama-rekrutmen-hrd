<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLamaran extends Model
{
    use HasFactory;
    protected $table = 'status_lamaran';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $primaryKey = 'id_status_lamaran';

    public function status(){
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function pelamarLowongan(){
        return $this->belongsTo(PelamarLowongan::class,'id_pelamar_lowongan','id_pelamar_lowongan');
    }

}
