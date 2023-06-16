<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Benefit extends Model
{
    use HasFactory;
    protected $table = 'tb_benefit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_course',
        'nama',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\CourseModel','id_course');
    }
}
