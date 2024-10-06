<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // User::truncate();

        $users = [
            [
                'nama' => 'MOH. AMIN, S.A.N.',
                'jenis_kelamin' => 'Laki-laki',
                'no_telepon' => '081939111113',
                'alamat' => 'Surabaya',
                'status' => 'ADMIN',
                'aktif' => 'y',
                'username' => 'amin',
                'email' => 'amin@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'gambar' => 'gambar_user/user1.jpg',
                'divisi_id' => 5
            ],
            [
                'nama' => 'ISHAK, S.Pd., M.M.',
                'jenis_kelamin' => 'Laki-laki',
                'no_telepon' => '82332918672',
                'alamat' => 'Surabaya',
                'status' => 'ADMIN',
                'aktif' => 'y',
                'username' => 'ishak',
                'email' => 'ishak@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'gambar' => 'gambar_user/user2.png',
                'divisi_id' => 1
            ],
            // Add more users following the same structure
            [
                'nama' => 'YUNI HARTATIK, S.T.',
                'jenis_kelamin' => 'Perempuan',
                'no_telepon' => '08131117708',
                'alamat' => 'Surabaya',
                'status' => 'ADMIN',
                'aktif' => 'y',
                'username' => 'yuni',
                'email' => 'yuni@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'gambar' => 'gambar_user/user2.png',
                'divisi_id' => 10
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // Schema::enableForeignKeyConstraints();
    }
}
