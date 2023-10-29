<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // [
            //     'name' => 'Anggota',
            //     'email' => 'Anggota@testing.com',
            //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            //     'slug' => 'testing-anggota',
            //     'telp' => '08978301234',
            //     'role' => 'Anggota',
            //     'birthdate' => '2001-07-22',
            //     'gender' => 'Laki-laki',
            //     'identify' => '1234567891',
            //     'email_verified_at' => now(),
            // ],
            [
                'name' => 'Petugas',
                'email' => 'Petugas@testing.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'slug' => 'testing-petugas',
                'telp' => '08978305678',
                'role' => 'Petugas',
                'birthdate' => '2001-07-22',
                'gender' => 'Laki-laki',
                'identify' => '1234567892',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Kepala',
                'email' => 'Kepala@testing.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'slug' => 'testing-kepala',
                'telp' => '08978309012',
                'role' => 'Kepala',
                'birthdate' => '2001-07-22',
                'gender' => 'Laki-laki',
                'identify' => '1234567893',
                'email_verified_at' => now(),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
