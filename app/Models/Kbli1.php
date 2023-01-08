<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kbli1 extends Model
{
    use HasFactory;
    protected $table = 'kbli';
    protected $fillable = [
        'kode_kbli',
        'nama_kbli',
        'fungsi_kbli'
    ];

    /**
     * Get all of the kbliII for the Kbli1
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kbliII(): HasMany
    {
        return $this->hasMany(Kbli2::class, 'kbli_id', 'id');
    }
}