<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kbli5 extends Model
{
    use HasFactory;
    protected $table = 'golongan_5';
    protected $fillable = [
        'golongan_4_id',
        'kode_kbli',
        'nama_kbli',
        'fungsi_kbli'
    ];

    /**
     * Get the user that owns the Kbli2
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kbli4(): BelongsTo
    {
        return $this->belongsTo(Kbli4::class, 'golongan_4_id', 'id');
    }
}