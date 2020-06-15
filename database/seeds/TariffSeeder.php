<?php

use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tariffs = [
          [
              'name' => 'Начальный',
              'cost' => '118',
              'description' => 'Тариф для тех кто не пользовался нашими сервисами!'
          ],
          [
              'name' => 'Малого бизнеса',
              'cost' => '1500',
              'description' => 'Тариф для малого бизнеса!'
          ],
          [
              'name' => 'Среднего бизнеса',
              'cost' => '4507',
              'description' => 'Тариф для средного бизнеса!'
          ],
          [
              'name' => 'Крупного предприятия',
              'cost' => '9905',
              'description' => 'Тариф для крупных предприятии!'
          ],
        ];


        foreach ($tariffs as $key => $val) {
            $tariff = new \App\Tariff();
            $tariff->fill($val)->save();
        }


    }
}
