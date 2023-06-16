<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = 'tb_banner';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'status'
    ];
}
