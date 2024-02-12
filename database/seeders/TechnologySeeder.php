<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['Bootstrap', 'Vite', 'Laravel'];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->title = $technology;
            $new_technology->save();
        }
    }
}
