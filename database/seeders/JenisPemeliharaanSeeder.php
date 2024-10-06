<?php

namespace Database\Seeders;

use App\Models\JenisPemeliharaan;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;

class JenisPemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // JenisPemeliharaan::truncate();

        $maintenanceTypes = [
            'Tanpa Pemeliharaan',
            'Jarang Pemeliharaan',
            'Sering Pemeliharaan'
        ];

        foreach ($maintenanceTypes as $type) {
            JenisPemeliharaan::create(['nama' => $type]);
        }

        // Schema::enableForeignKeyConstraints();
    }
}
