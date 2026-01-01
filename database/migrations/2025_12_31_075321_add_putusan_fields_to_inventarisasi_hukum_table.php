<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPutusanFieldsToInventarisasiHukumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarisasi_hukum', function (Blueprint $table) {
            $table->string('jenis_peradilan')->nullable()->after('tipe_dokumen');
            $table->string('singkatan_jenis_peradilan')->nullable()->after('jenis_peradilan');
            $table->string('tempat_peradilan')->nullable()->after('singkatan_jenis_peradilan');
            $table->date('tgl_dibacakan')->nullable()->after('tempat_peradilan');
            $table->string('status_putusan')->nullable()->after('tgl_dibacakan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventarisasi_hukum', function (Blueprint $table) {
            $table->dropColumn(['jenis_peradilan', 'singkatan_jenis_peradilan', 'tempat_peradilan', 'tgl_dibacakan', 'status_putusan']);
        });
    }
}
