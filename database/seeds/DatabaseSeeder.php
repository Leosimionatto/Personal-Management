<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TechnologyTableSeeder::class);
        $this->call(SituationTableSeeder::class);
        $this->call(PriorityTableSeeder::class);
        $this->call(ProjectTypeTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(GroupTableSeeder::class);
    }
}
