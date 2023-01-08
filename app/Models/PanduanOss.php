<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanduanOss extends Model
{
    use HasFactory;
    protected $table = 'panduan_osses';
    protected $fillable = [
        'nama_panduan',
        'file_panduan',
        'kategori'
    ];
}