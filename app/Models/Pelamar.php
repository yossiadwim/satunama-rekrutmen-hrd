<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pelamar extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = [
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon_rumah',
        'telepon_kantor',
        'suku',
        'kebangsaan',
        'id_agama',
        'tinggi_badan',
        'berat_badan',
        'status_kawin',
        'nama_pasangan',
    ];
    protected $table = 'pelamar';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id_pelamar', 'id');
    }

    public function pengalamanKerja()
    {
        return $this->hasMany(PengalamanKerja::class, 'id_pelamar', 'id');
    }


    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'id_pelamar', 'id');
    }

    public function pelamarLowongan()
    {
        return $this->hasMany(PelamarLowongan::class, 'id_pelamar', 'id');
    }

    public function referensi()
    {
        return $this->hasMany(Referensi::class, 'id_pelamar', 'id');
    }

    public function agama()
    {
        return $this->hasOne(Agama::class, 'id_agama', 'id_agama');
    }
    
    public function anakPelamar(){
        return $this->hasMany(AnakPelamar::class,'id_pelamar','id');
    }

    public function keluargaPelamar(){
        return $this->hasMany(KeluargaPelamar::class,'id_pelamar','id');
    }

    public function pelatihan(){
        return $this->hasMany(Pelatihan::class,'id_pelamar','id');
    }

    public function kemampuanKomputer(){
        return $this->hasMany(kemampuanKomputer::class,'id_pelamar','id');
    }

    public function kontakDarurat(){
        return $this->hasMany(KontakDarurat::class,'id_pelamar','id');
    }

    public function penguasaanBahasa(){
        return $this->hasMany(PenguasaanBahasa::class,'id_pelamar','id');
    }

    public function penglamanOrganisasi(){
        return $this->hasMany(PengalamanOrganisasi::class,'id_pelamar','id');
    }

    public function kondisiKesehatan(){
        return $this->hasMany(KondisiKesehatan::class,'id_pelamar','id');
    }
}

