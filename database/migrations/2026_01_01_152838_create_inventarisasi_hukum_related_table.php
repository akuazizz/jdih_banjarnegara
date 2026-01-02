<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisasiHukumRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarisasi_hukum_related', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventarisasi_hukum_id');
            $table->unsignedBigInteger('related_id');
            $table->timestamps();

            $table->index(['inventarisasi_hukum_id', 'related_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarisasi_hukum_related');
    }
}
