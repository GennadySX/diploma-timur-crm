<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i =1; $i<= 15; $i++) {
            $employee = new \App\Employee();
            $employee->fill([
                'user_id' => $i,
                'company_id' => $faker->numberBetween(1,10),
                'role_id' => $faker->numberBetween(1,9),
                'department_id' => $faker->numberBetween(1,10)
            ])->save();
        }

    }
}
