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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 100)->unique();
            $table->string('nama', 100);
            $table->date('tanggal_pembelian');
            $table->string('brand', 100);
            $table->string('kondisi', 100);
            $table->string('gambar', 200);
            $table->string('nama_penerima');
            $table->string('tempat', 100);
            $table->string('deskripsi')->nullable();
            $table->enum('aktif', ['y', 't'])->default('y');

            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');

            $table->unsignedBigInteger('jenis_pemeliharaan_id');
            $table->foreign('jenis_pemeliharaan_id')->references('id')->on('jenis_pemeliharaan');

            $table->unsignedBigInteger('ruang_id');
            $table->foreign('ruang_id')->references('id')->on('ruang');

            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendor');

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
        Schema::dropIfExists('aset');
    }
};
