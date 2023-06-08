<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Penjemputan;
use App\Models\Role;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(UserSeeder::class);

        Layanan::create([
            'name' => 'Deep Clean for White Shoes',
            'harga' => '15000'
        ]);


        Layanan::create([
            'name' => 'Medium Cleaning',
            'harga' => '10000'
        ]);

        Pembayaran::create([
            'nama' => 'tunai',
        ]);

        Pembayaran::create([
            'nama' => 'Non tunai',
        ]);

        Pengiriman::create([
            'name' => 'ambil sendiri',
            'harga' => 0
        ]);

        Pengiriman::create([
            'name' => 'Dikirim',
            'harga' => 3000
        ]);

        Penjemputan::create([
            'name' => 'Dijemput',
            'harga' => 3000
        ]);

        Penjemputan::create([
            'name' => 'Antar Sendiri',
            'harga' => 0
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'user',
        ]);

        User::create([
            'name' => 'lana',
            'email' => 'admin@admin.com',
            'password' => bcrypt('coba'),
            'id_role' => 1,
            'email_verified_at' => now()
        ]);


        User::create([
            'name' => 'saya',
            'email' => 'saya@admin.com',
            'password' => bcrypt('saya'),
            'id_role' => 2,
            'email_verified_at' => now()
        ]);
    }
}
