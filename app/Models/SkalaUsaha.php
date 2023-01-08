<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaUsaha extends Model
{
    use HasFactory;
    protected $table = 'skala_usahas';
    protected $fillable = [
        'nama_skala_usaha',
        'keterangan_skala_usaha',
        'description_skala_usaha'
    ];
}