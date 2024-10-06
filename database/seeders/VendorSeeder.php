<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Vendor::truncate();

        $vendors = [
            [
                'nama'      => 'PT. Maju Bersama',
                'alamat'    => 'Jl. Kebon Jeruk No. 12, Jakarta Barat',
                'deskripsi' => 'Supplier alat kantor dan elektronik.'
            ],
            [
                'nama'      => 'CV. Supplier Komputer',
                'alamat'    => 'Jl. Melati No. 23, Surabaya',
                'deskripsi' => 'Menyediakan berbagai jenis perangkat keras komputer.'
            ],
            [
                'nama'      => 'Distributor Serba Ada',
                'alamat'    => 'Jl. Raya Timur No. 45, Bandung',
                'deskripsi' => 'Distributor resmi barang konsumsi dan elektronik.'
            ],
            [
                'nama'      => 'PT. Teknologi Informasi Indonesia',
                'alamat'    => 'Jl. Teknologi No. 5, Yogyakarta',
                'deskripsi' => 'Solusi lengkap untuk perangkat IT dan jaringan.'
            ]
            // Add more vendors as needed
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }

        // Schema::enableForeignKeyConstraints();
    }
}
