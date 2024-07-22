<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 50; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->sentence(2);
            $newProject->description = $faker->sentence(22);
            $newProject->img = "https://picsum.photos/id/" . rand(1, 250) . "/450/450";
            $newProject->slug = STR::slug($newProject->title, '-');
            $newProject->type_id = $faker->numberBetween(1,4);
            
            // $newProject->projects()->attach($i+1);
            // $newProject->technologies()->attach($faker->numberBetween(1,4));
            $newProject->save();
        }
    }
}
