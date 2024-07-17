<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class project_technology_table extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10 ; $i++) {

            // $manyToMany->project_id = $faker->numberBetween(1,10);
            // $manyToMany->technology_id = $faker->numberBetween(1,4);
            // DB::insert('insert into project_technology( project_id , technology_id ) values ($faker->numberBetween(1,10), $faker->numberBetween(1,4))');
            $sql = 'insert into project_technology ( project_id , technology_id  ) values (?, ?)';
            $project = $faker->numberBetween(1,10);
            $tech = $faker->numberBetween(1,4);
            DB::insert($sql, [
                $project,
                $tech,
            ]);
        }
    }
}
