<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class M_KategoriDestinasi extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'tb_kategoridestinasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'slug'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama',
                'onUpdate' => true
            ]
        ];
    }
}
