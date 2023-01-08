<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftarans';
    protected $fillable = [
        'user_id',
        'golongan_5_id',
        'jenisUsaha_id',
        'skalaUsaha_id',
        'namaJenisUsaha',
        'subdis_id',
        'dis_id',
        'phone',
        'name_perusahaan',
        'no_permohonan',
        'no_proyek',
        'nib',
        'sektor',
        'modal_usaha',
        'address',
        'name_perizinan',
        'risiko',
        'jenis_proyek',
        'status',
        'npwp',
        'nik',
        'jk',
        'tanggal_lahir',
        'jabatan',
        'no_sk'
    ];

    /**
     * Get the user that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skalaUsaha(): BelongsTo
    {
        return $this->belongsTo(SkalaUsaha::class, 'skalaUsaha_id', 'id');
    }

    /**
     * Get the jenisPelakuUsaha that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisPelakuUsaha(): BelongsTo
    {
        return $this->belongsTo(JenisUsaha::class, 'jenisUsaha_id', 'id');
    }

    /**
     * Get the kbli that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kbli(): BelongsTo
    {
        return $this->belongsTo(Kbli5::class, 'golongan_5_id', 'id');
    }
    /**
     * Get the user that owns the Pendaftaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}