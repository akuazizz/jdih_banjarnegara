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
        'pemrakarsa','penandatangan','hasil_uji_materi','tajuk_entri_utama','file_custom_status',
        'lokasi',
        'deskripsi_fisik'
    ];

}
