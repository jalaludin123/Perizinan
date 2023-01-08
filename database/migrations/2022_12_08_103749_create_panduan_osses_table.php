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
        Schema::create('panduan_osses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_panduan');
            $table->string('file_panduan');
            $table->tinyInteger('kategori')->comment('0=umk,1=non umk,2=pemerintah daerah,3=kementrian dan lembaga,4=badan pengusaha,5=kementrian investasi');
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
        Schema::dropIfExists('panduan_osses');
    }
};