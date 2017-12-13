<?php

use Illuminate\Database\Seeder;

class ProjectTypeTableSeeder extends Seeder
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
                'nmtipo' => 'Criar uma Aplicação Web',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s'),
            ],
            1 => [
                'nmtipo' => 'Criar uma Aplicação Mobile',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s'),
            ],
            2 => [
                'nmtipo' => 'Criar uma Aplicação Híbrida',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s'),
            ],
        ];

        \DB::table('tpprojeto')->insert($rolls);
    }
}
