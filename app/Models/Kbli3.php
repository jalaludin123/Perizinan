<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kbli3 extends Model
{
    use HasFactory;
    protected $table = 'golongan_3';
    protected $fillable = [
        'golongan_2_id',
        'kode_kbli',
        'nama_kbli',
        'fungsi_kbli'
    ];

    /**
     * Get the user that owns the Kbli2
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kbli2(): BelongsTo
    {
        return $this->belongsTo(Kbli2::class, 'golongan_2_id', 'id');
    }

    /**
     * Get all of the comments for the Kbli3
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kbliIv(): HasMany
    {
        return $this->hasMany(Kbli4::class, 'golongan_3_id', 'id');
    }
}