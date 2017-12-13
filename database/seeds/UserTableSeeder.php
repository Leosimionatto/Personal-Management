<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolls = [
            0 => [
                'nome' => 'Gilberto Giro Resende',
                'email' => 'gilberto.giro.resende@gmail.com',
                'documento' => '460.595.328-02',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s'),
            ]
        ];

        \DB::table('usuario')->insert($rolls);
    }
}
