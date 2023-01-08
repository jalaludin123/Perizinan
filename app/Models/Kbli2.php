<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kbli2 extends Model
{
    use HasFactory;
    protected $table = 'golongan_2';
    protected $fillable = [
        'kbli_id',
        'kode_kbli',
        'nama_kbli',
        'fungsi_kbli'
    ];

    /**
     * Get the user that owns the Kbli2
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kbli1(): BelongsTo
    {
        return $this->belongsTo(Kbli1::class, 'kbli_id', 'id');
    }

    /**
     * Get all of the comments for the Kbli2
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function KbliIII(): HasMany
    {
        return $this->hasMany(Kbli3::class, 'golongan_2_id', 'id');
    }
}