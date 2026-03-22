<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Seeder gốc: chạy bằng php artisan db:seed hoặc migrate --seed.
 */
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Tạo user mẫu + gọi CategorySeeder.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(CategorySeeder::class);
    }
}
