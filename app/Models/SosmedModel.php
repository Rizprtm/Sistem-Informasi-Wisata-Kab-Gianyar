<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosmedModel extends Model
{
    use HasFactory;
    protected $table = 'tb_sosmed';
    protected $primaryKey = 'id';
    protected $fillable = [
        'icon',
        'link',
        'status'
    ];
}
