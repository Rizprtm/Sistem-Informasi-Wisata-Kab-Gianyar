<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Review extends Model
{
    use HasFactory;
    protected $table = 'tb_review';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'email',
        'subject',
        'komentar',
    ];
}
