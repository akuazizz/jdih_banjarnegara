<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarisasiHukum extends Model
{
    protected $table = 'inventarisasi_hukum';
    public $timestamps = true;
    protected $fillable = [
        'reff_id',
        'jenis',
        'singkatan_jenis',
        'no_peraturan',
        'pengarang',
        'tgl_ditetap',
        'tgl_diundang',
        'tahun_diundang',
        'content',
        'abstrak',
        'tmp_terbit',
        'penerbit',
        'sumber',
        'file',
        'file_tags',
        'file_date',
        'file_author',
        'file_url',
        'status',
        'publish',
        'unduh',
        'view',
        'bid_hukum',
        'link',
        'bahasa',
        'isbn',
        'no_panggil',
        'no_induk_buku',
        'tipe_dokumen',
        'pemrakarsa',
        'penandatangan',
        'hasil_uji_materi',
        'tajuk_entri_utama',
        'file_custom_status',
        'lokasi',
        'deskripsi_fisik',
        'jenis_peradilan',
        'singkatan_jenis_peradilan',
        'tempat_peradilan',
        'tgl_dibacakan',
        'status_putusan'
    ];

    public function relatedDocuments()
    {
        return $this->belongsToMany(InventarisasiHukum::class, 'inventarisasi_hukum_related', 'inventarisasi_hukum_id', 'related_id')
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->select([
                'inventarisasi_hukum.*',
                'kategori.nama as kategori_nama'
            ]);
    }
}
