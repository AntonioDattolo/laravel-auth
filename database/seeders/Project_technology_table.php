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
        for ($i=0; $i < 25 ; $i++) {
            $sql = 'insert into project_technology ( project_id , technology_id  ) values (?, ?)';
            $project = $faker->numberBetween(1,10);
            $tech= $faker->numberBetween(1,4);
            DB::insert($sql, [
                $project,
                $tech,
            ]);
        }
    }
}
