<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Ruang::truncate();

        $rooms = [
            [
                'nama' => 'Laboratorium Instalasi Tenaga Listrik',
                'deskripsi' => 'Dedikasi untuk praktik dan riset dalam instalasi tenaga listrik.'
            ],
            [
                'nama' => 'Laboratorium Kimia Industri',
                'deskripsi' => 'Digunakan untuk eksperimen dan belajar tentang kimia industri.'
            ],
            [
                'nama' => 'Laboratorium Kendaraan Ringan Otomotif',
                'deskripsi' => 'Fokus pada studi dan praktik perbaikan kendaraan ringan.'
            ],
            [
                'nama' => 'Laboratorium Agribisnis Pengolahan Hasil Pertanian',
                'deskripsi' => 'Menyediakan fasilitas untuk pengolahan hasil pertanian.'
            ],
            [
                'nama' => 'Laboratorium Nautika Kapal Penangkap Ikan',
                'deskripsi' => 'Fasilitas untuk studi nautika dan operasi kapal penangkap ikan.'
            ],
            [
                'nama' => 'Laboratorium Multimedia',
                'deskripsi' => 'Pusat pembelajaran dan produksi media digital dan multimedia.'
            ]
            // You can add more room data here as needed
        ];

        foreach ($rooms as $room) {
            Ruang::create($room);
        }

        // Schema::enableForeignKeyConstraints();
    }
}
