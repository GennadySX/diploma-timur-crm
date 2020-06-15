<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class DocumentSeeder extends Seeder
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
            $document = new \App\Document();
            $document->fill([
                'file_id' => $faker->numberBetween(1, 15),
                'model_type' => "App\Company",
                'model_id' => $faker->numberBetween(1, 10),
            ])->save();
        }
    }
}
