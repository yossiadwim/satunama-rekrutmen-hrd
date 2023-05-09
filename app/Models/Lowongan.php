<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lowongan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    public $table = 'lowongan';
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
      ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_lowongan'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function pelamarLowongan(){
        return $this->hasMany(PelamarLowongan::class,'id_lowongan','id');

    }
}
