<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class EmailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i =0; $i<=30; $i++){
            $emailer = new \App\Emailer();
            $emailer->fill([
                'sender_id' => $faker->numberBetween(2, 5),
                'name' => $faker->firstName.' '.$faker->lastName,
                'email' => 'mail@mail.com',
                'subject' => $faker->streetName,
                'message' => $faker->text(150),
            ])->save();
        }
    }
}
