<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skala_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skala_usaha', 100);
            $table->string('keterangan_skala_usaha', 100);
            $table->text('description_skala_usaha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skala_usahas');
    }
};