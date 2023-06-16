<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksescourseModel extends Model
{
    use HasFactory;
    protected $table = 'tb_aksescourse';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pengguna',
        'id_course',
        'tgl_beli'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_pengguna');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\CourseModel','id_course');
    }
}
