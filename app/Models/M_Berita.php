<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class M_Berita extends Model
{
    use LogsActivity;
    use HasFactory, Sluggable;
    
    protected $table = 'tb_berita';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kategoriberita',
        'judul',
        'slug',
        'foto',
        'deskripsi',
        'status',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable('*');
        // Chain fluent methods for configuration options
    }
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
        return $this->belongsTo('App\Models\M_KategoriBerita', 'id_kategoriberita');
    }
}
