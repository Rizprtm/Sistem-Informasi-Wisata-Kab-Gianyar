<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenmateriModel extends Model
{
    use HasFactory;
    protected $table = 'tb_kontenmateri';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_course',
        'id_groupcourse',
        'nama',
        'tipe',
        'konten'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\CourseModel', 'id_course', 'id');
    }
}
