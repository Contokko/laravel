<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i < 20 ; $i++) {
            Buku::create([
                'id' => Str::uuid(),
                'judul' => fake()->name(),
                'penulis' => fake()->name(),
                'jml_hal' => fake()->numberBetween(1,100)
            ]);
        }
    }
}
