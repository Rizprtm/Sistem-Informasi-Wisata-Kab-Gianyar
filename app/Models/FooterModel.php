<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterModel extends Model
{
    use HasFactory;
    public $table = 'tb_footer';
    public $primaryKey = 'id';
    public $fillable = [
        'nama',
        'link'
    ];
}
