<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_LogActivity extends Model
{
    use HasFactory;
    
    protected $table = 'activity_log';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'description',
        'subject_type',
        'event',
        'subejct_id',
        'causer_type',
        'causer_id',
        'created_at',
    ];
}
