<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Thêm vài danh mục mẫu vào bảng categories.
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Laptop']);
        Category::create(['name' => 'Phone']);
        Category::create(['name' => 'Tablet']);
        Category::create(['name' => 'Accessories']);
    }
}
