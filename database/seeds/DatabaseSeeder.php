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

        $this->call(UserSeeder::class);
        $this->call(FilesSeeder::class);
        $this->call(TariffSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(UserTaskSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(FilesSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(ChatSeeder::class);
        $this->call(EmailerSeeder::class);
    }
}
