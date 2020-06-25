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
        for ($i =1; $i<= 6; $i++) {
            $employee = new \App\Employee();
            $employee->fill([
                'user_id' => $i,
                'company_id' => 1,
                'role_id' => $faker->numberBetween(1,9),
                'department_id' =>  1
            ])->save();
        }

    }
}
