<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(UserSeed::class);
        $this->call(FilesSeeder::class);
        $this->call(ProfilerSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(AgreementsSeeder::class);
        $this->call(ProfilerSeeder::class);
        $this->call(ProfilerSeeder::class);
        $this->call(ProfilerSeeder::class);
    }
}
