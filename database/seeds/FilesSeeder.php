<?php

use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //





        for ($i = 1; $i<=50; $i++) {
            $faker = new Faker\Generator();

            $is = $this->modelFigure($i);

            $file = new \App\Files();
            $file->fill([
                'user_id'=> $i,
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
