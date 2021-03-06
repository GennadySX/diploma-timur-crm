<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i < 50; $i++) {
            $user_task = new \App\UserTask();
            $user_task->fill([
                'company_id' => 1,
                'department_id' => 1,
                'task_id' => $faker->numberBetween(1,14),
                'executor_id' => $faker->numberBetween(2, 5),
                'creator_id' => $faker->numberBetween(2, 5),
                'task_status' => $faker->randomElement(['s', 'e', 't', 'p']),
                'description' => 'User task description '.$i
            ])->save();
        }
    }
}
