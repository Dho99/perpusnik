<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'email' => fake()->unique()->safeEmail(),
            'namaLengkap' => fake()->name(),
            'level' => 1,
            'alamat' => fake()->address(),
        ]);

        \App\Models\Kategori::factory()->create(['namaKategori' => 'Teknologi']);
        \App\Models\Kategori::factory()->create(['namaKategori' => 'Pendidikan']);
        \App\Models\Kategori::factory()->create(['namaKategori' => 'Parenting']);
        \App\Models\Kategori::factory()->create(['namaKategori' => 'Investasi']);

        \App\Models\Buku::factory(20)->create();

    }
}
