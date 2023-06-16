<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;
    protected $table = 'tb_settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'web_title',
        'header_logo',
        'footer_logo',
        'favicon',
        'breadcrumb',
        'judul_kelebihan',
        'deskripsi_kelebihan',
        'footer_text',
        'copyright_text',
        'preloader'
    ];
}
