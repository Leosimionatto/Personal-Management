<?php

use Illuminate\Database\Seeder;

class PriorityTableSeeder extends Seeder
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
                'codprioridade' => 'ind',
                'nmprioridade'  => 'Pendente',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            1 => [
                'codprioridade' => 'min',
                'nmprioridade'  => 'Mínima',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            2 => [
                'codprioridade' => 'med',
                'nmprioridade'  => 'Média',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            3 => [
                'codprioridade' => 'max',
                'nmprioridade'  => 'Máxima',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
        ];

        \DB::table('prioridade')->insert($rolls);
    }
}
