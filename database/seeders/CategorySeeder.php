<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::Create([
            'name' => 'Matematicas'
            ]);
        
        Category::Create([
            'name' => 'Cultura'
            ]);

        Category::Create([
            'name' => 'Arte'
            ]);

        Category::Create([
            'name' => 'Arquitectura'
            ]);

        Category::Create([
            'name' => 'Medicina'
            ]);

        
    }
}
