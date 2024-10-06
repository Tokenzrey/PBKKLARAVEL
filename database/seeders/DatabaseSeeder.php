<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DivisiSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(JenisPemeliharaanSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(AsetSeeder::class);
    }
}
