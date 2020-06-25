<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i<=50; $i++) {

            $is = $this->modelFigure($i);

            $file = new \App\Files();
            $file->fill([
                'user_id'=> $faker->numberBetween(2, 5),
                'model_type' => $is['type'],
                'model_id' => $is['id'],
                'type'=> 'picture',
                'status' => 'public',
                'path' => "/uploads/image_".$i.".jpg",
            ])->save();
        }
    }



    protected function modelFigure($i) {
        $id = $i;
        $type = '';
        switch ($i) {
            case ($i > 15 && $i <=30):
                $id = $i-10;
                $type = "Company";
                break;
            case ($i > 30 && $i <=45):
                $id = $i-30;
                $type = "Company";
                break;
            default:
                $id = $i;
                $type = 'User';
                break;
        }

        return ['type' => "App\\".$type, 'id'=>$id];
    }
}
