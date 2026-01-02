<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixPutusanFileUrlCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Fix file_url untuk Putusan: ubah dari 'Putusan' ke 'putusan' (lowercase)
        DB::statement("
            UPDATE inventarisasi_hukum
            SET file_url = REPLACE(file_url, 'produk_hukum/Putusan/', 'produk_hukum/putusan/')
            WHERE file_url LIKE '%/Putusan/%'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Rollback: kembalikan ke huruf besar
        DB::statement("
            UPDATE inventarisasi_hukum
            SET file_url = REPLACE(file_url, 'produk_hukum/putusan/', 'produk_hukum/Putusan/')
            WHERE file_url LIKE '%/putusan/%'
        ");
    }
}
