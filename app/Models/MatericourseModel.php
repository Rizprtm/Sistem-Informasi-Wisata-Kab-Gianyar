<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatericourseModel extends Model
{
    use HasFactory;
    protected $table = 'tb_matericourse';
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
