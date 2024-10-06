<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder adds multiple division entries to the Divisi table.
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Divisi::truncate();

        $divisiNames = [
            'Kepala Sekolah',
            'Koordinator Tata Usaha',
            'Administrasi Kepegawaian',
            'Administrasi Keuangan',
            'Administrasi Sarana dan Prasarana',
            'Administrasi Hubungan Masyarakat',
            'Administrasi Umum dan Kearsipan',
            'Administrasi Kesiswaan',
            'Administrasi Kurikulum',
            'Administrasi Perpustakaan',
            'Administrasi Operator Dapodik',
            'Administrasi Unit Produksi dan Jasa',
            'Toolman',
            'Petugas Kebersihan',
            'Penjaga Sekolah',
            'Satuan Pengamanan',
            'Penjaga Malam',
            'PLH & Adiwiyata'
        ];

        foreach ($divisiNames as $name) {
            Divisi::create(['nama' => $name]);
        }

        // Schema::enableForeignKeyConstraints();
    }
}
