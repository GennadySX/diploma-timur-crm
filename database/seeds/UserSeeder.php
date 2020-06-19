<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\User $user)
    {
        //
        $user = new \App\User();
        $user->fill([
            'firstName'=> 'Timur',
            'lastName'=> 'Zotov',
            'role'=> 'admin',
            'email'=> 'admin@mail.com',
            'password'=> bcrypt('adminPass'),
        ])->save();

      factory(\App\User::class, 14)->create();

    }
}
