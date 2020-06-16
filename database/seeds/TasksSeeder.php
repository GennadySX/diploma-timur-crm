<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i =1; $i<15; $i++) {
            $task = new \App\Tasks();
            $task->fill([
                'creator_id' => $faker->numberBetween(1, 15),
                'cost' =>  $faker->numberBetween(450, 45000),
                'priority' => $faker->randomElement(['a', 'b', 'c']),
                'status' => $faker->randomElement(['s', 't', 'e', 'p']),
                'expire_date' => $faker->date('2020-07-15', '2020-09-04'),
                'description' => 'text is ...'
            ])->save();
        }
    }
}
