<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            0 => [
                'id'      => 1,
                'nmcargo' => 'Geral',
                'stcargo' => 'ati'
            ],
            1 => [
                'id'      => 2,
                'nmcargo' => 'Full Stack',
                'stcargo' => 'ati'
            ],
            2 => [
                'id'      => 3,
                'nmcargo' => 'Back-end',
                'stcargo' => 'ati'
            ],
            3 => [
                'id'      => 4,
                'nmcargo' => 'Front-end',
                'stcargo' => 'ati'
            ],
        ];

        DB::table('cargo')->insert($roles);
    }
}
