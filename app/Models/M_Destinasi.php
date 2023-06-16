<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class M_Destinasi extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'tb_destinasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategoridestinasi',
        'judul',
        'slug',
        'foto',
        'deskripsi',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
                'onUpdate' => true
            ]
        ];
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\M_KategoriDestinasi', 'id_kategoridestinasi');
    }
}
