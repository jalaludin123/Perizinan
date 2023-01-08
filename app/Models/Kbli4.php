<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kbli4 extends Model
{
    use HasFactory;
    protected $table = 'golongan_4';
    protected $fillable = [
        'golongan_3_id',
        'kode_kbli',
        'nama_kbli',
        'fungsi_kbli'
    ];

    /**
     * Get the user that owns the Kbli2
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kbli3(): BelongsTo
    {
        return $this->belongsTo(Kbli3::class, 'golongan_3_id', 'id');
    }

    /**
     * Get all of the comments for the Kbli4
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kbliV(): HasMany
    {
        return $this->hasMany(Kbli5::class, 'golongan_4_id', 'id');
    }
}