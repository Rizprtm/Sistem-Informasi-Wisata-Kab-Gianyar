<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_informasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'jumlah',
        'status'
    ];
}
