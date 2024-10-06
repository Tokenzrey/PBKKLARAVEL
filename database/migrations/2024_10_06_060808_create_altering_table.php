<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMasaManfaatToKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * This method adds new columns to the 'kategori' table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori', function (Blueprint $table) {
            // Add an integer column named 'masa_manfaat' after the 'aktif' column
            // This column represents the useful life of an asset in years
            $table->integer('masa_manfaat')->after('aktif')->comment('Masa manfaat aset dalam tahun');

            // Add a char column named 'kode' with a length of 2 after the 'nama' column
            $table->char('kode', 2)->after('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method removes the columns that were added in the up() method.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori', function (Blueprint $table) {
            // Remove the 'masa_manfaat' column from the 'kategori' table
            $table->dropColumn('masa_manfaat');

            // Remove the 'kode' column from the 'kategori' table
            $table->dropColumn('kode');
        });
    }
}
