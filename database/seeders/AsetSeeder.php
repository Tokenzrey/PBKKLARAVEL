<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Aset;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;

class AsetSeeder extends Seeder
{
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Aset::truncate();
        Aset::create(
            [
                'kode'                  =>'0001/PK/JA/LITL',
                'nama'                  => 'Komputer',
                'tanggal_pembelian'     => Carbon::parse('2023-06-01'),
                'brand'                 => 'Testing',
                'kondisi'               => 'Baik',
                'gambar'                => 'gambar_aset/monitor.jpg',
                'nama_penerima'         => 'testing',
                'tempat'                => 'Testing',
                'deskripsi'             => '',
                'kategori_id'           =>  1,
                'jenis_pemeliharaan_id' =>  1,
                'ruang_id'              =>  1,
                'vendor_id'           =>  1
            ]
        );
    }
}
