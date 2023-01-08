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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('golongan_5_id')->nullable();
            $table->unsignedBigInteger('jenisUsaha_id')->nullable();
            $table->unsignedBigInteger('skalaUsaha_id')->nullable();
            $table->unsignedBigInteger('subdis_id')->nullable();
            $table->unsignedBigInteger('dis_id')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('name_perusahaan', 200)->nullable();
            $table->string('no_permohonan')->nullable();
            $table->string('no_proyek')->nullable();
            $table->string('nib')->nullable();
            $table->string('sektor')->nullable();
            $table->string('modal_usaha')->nullable();
            $table->text('address')->nullable();
            $table->string('name_perizinan')->nullable();
            $table->string('risiko')->nullable();
            $table->string('jenis_proyek')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=terbit otomatis,1=verifikasi')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nik')->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->tinyInteger('jk')->comment('0=laki-laki,1=perempuan')->nullable();
            $table->string('no_sk')->nullable();
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
        Schema::dropIfExists('pendaftarans');
    }
};