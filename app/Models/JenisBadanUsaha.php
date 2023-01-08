<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JenisBadanUsaha extends Model
{
    use HasFactory;
    protected $table = 'jenis_badan_usahas';
    protected $fillable = [
        'jenisUsaha_id',
        'nama_jenisBadanUsaha'
    ];

    /**
     * Get the jenisBadanUsaha that owns the JenisBadanUsaha
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisUsaha(): BelongsTo
    {
        return $this->belongsTo(JenisUsaha::class, 'jenisUsaha_id', 'id');
    }
}