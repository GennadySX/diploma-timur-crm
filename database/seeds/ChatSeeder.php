<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //


        for ($i = 1; $i<=30; $i++) {
            $chat = new \App\Chat();
            $chat->fill([
                'user_f_id' => $faker->numberBetween(1, 15),
                'user_s_id' => $faker->numberBetween(1, 15),
                'chat' => $this->chatLetter($faker),
            ])->save();
        }
    }


    public function chatLetter(Faker $faker)
    {
        $message = [];
        for ($i = 1; $i<=10; $i++) {
            $message[] = [
                'id' => $i,
                'sender' => $faker->randomElement(['user_f', 'user_s']),
                'message' => $faker->text(20),
                'status' => $faker->randomElement(['y', 'n'])
            ];
        }
        return json_encode($message);
    }
}


