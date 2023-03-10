<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'districts';

    protected $fillable = [
        'dis_name',
        'city_id'
    ];

    protected $primaryKey = 'dis_id';
}