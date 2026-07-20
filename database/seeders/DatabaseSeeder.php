<?php

namespace Database\Seeders;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Libro::factory()->count(25)->create();

        User::factory()->create([
            'name' => 'Omar API',
            'email' => 'omar.api@example.com',
        ]);
    }
}
