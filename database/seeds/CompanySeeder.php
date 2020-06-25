<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i <= 2; $i++ ) {

            $company = new \App\Company();
            $company->fill([
                'ceo_id' => $i,
                'name' => $faker->name,
                'description' => $faker->text(200),
                'image_id' => $i+10,
            ])->save();
        }

    }
}
