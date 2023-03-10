<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable = [
        'prov_name',
        'locationid',
        'status'
    ];

    protected $primaryKey = 'prov_id';
}