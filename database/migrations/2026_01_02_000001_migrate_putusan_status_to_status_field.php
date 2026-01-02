<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MigratePutusanStatusToStatusField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Set semua Putusan yang status field-nya NULL menjadi 1 (Berlaku)
        DB::statement("
            UPDATE inventarisasi_hukum
            SET status = 1
            WHERE tipe_dokumen = 4
            AND status IS NULL
        ");

        // Opsional: Drop column status_putusan setelah migrasi
        // Schema::table('inventarisasi_hukum', function (Blueprint $table) {
        //     $table->dropColumn('status_putusan');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Rollback: set status back to NULL for Putusan
        DB::statement("
            UPDATE inventarisasi_hukum
            SET status = NULL
            WHERE tipe_dokumen = 4
        ");
    }
}
