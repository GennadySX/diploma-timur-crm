<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
        [
            'name' => 'Админ',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность Адмимистратора'
        ],
        [
            'name' => 'Разработчик',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность разработчика'
        ],
        [
            'name' => 'Директор',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность директора'
        ],
        [
            'name' => 'Менеджер',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность менеджера'
        ],
        [
            'name' => 'Бухгалтер',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность бухгалтера'
        ],
        [
            'name' => 'Повар',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность повара'
        ],
        [
            'name' => 'Продавец',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность продавеца'
        ],
        [
            'name' => 'Уборщик',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность уборщика'
        ],
        [
            'name' => 'Доставщик',
            'company_type' => 'App\Company',
            'company_id' => 1,
            'status' => 'public',
            'description' => 'Должность доставщика'
        ],
        ];

        foreach ($roles as $key =>$value) {
            $role = new \App\Role();
            $role->fill($value)->save();
        }

    }
}
