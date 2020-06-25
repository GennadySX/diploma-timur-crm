<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i =1; $i < 3; $i++) {
            $department = new \App\Department();
            $department->fill([
                'company_id' => 1,
                'name' => $faker->streetName,
                'address' => $faker->address,
            ])->save();
        }


    }
}
