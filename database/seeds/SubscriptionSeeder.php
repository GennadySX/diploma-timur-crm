<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i<=10; $i++) {
            $subscription = new \App\Subscription();
            $subscription->fill([
                'tariff_id' => $faker->numberBetween(1, 4),
                'company_id'=> $i
            ])->save();
        }
    }
}
