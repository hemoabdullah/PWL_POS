<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                ['category_id' => 1, 'category_code' => 'HAM1', 'category_name' => 'Ham Series Alpha'],
                ['category_id' => 2, 'category_code' => 'HEM2', 'category_name' => 'Hem Motion Line'],
                ['category_id' => 3, 'category_code' => 'HEMO3', 'category_name' => 'Hemo Active Gear'],
                ['category_id' => 4, 'category_code' => 'HAMAM4', 'category_name' => 'Hamam Urban Style'],
                ['category_id' => 5, 'category_code' => 'H5', 'category_name' => 'H-Lite Footwear'],
            
        ];

        Category::insert($data);
    }
}
