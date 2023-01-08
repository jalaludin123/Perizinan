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
        Schema::create('jenis_badan_usahas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenisUsaha_id');
            $table->string('nama_jenisBadanUsaha', 100);
            $table->foreign('jenisUsaha_id')->references('id')->on('jenis_usahas')->onDelete('cascade');
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
        Schema::dropIfExists('jenis_badan_usahas');
    }
};