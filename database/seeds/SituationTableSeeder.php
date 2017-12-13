<?php

use Illuminate\Database\Seeder;

class SituationTableSeeder extends Seeder
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
                'codsituacao' => 'pen',
                'nmsituacao'  => 'Pendente',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            1 => [
                'codsituacao' => 'and',
                'nmsituacao'  => 'Andamento',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            2 => [
                'codsituacao' => 'rev',
                'nmsituacao'  => 'Revisão',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            3 => [
                'codsituacao' => 'pau',
                'nmsituacao'  => 'Pausado',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            4 => [
                'codsituacao' => 'fin',
                'nmsituacao'  => 'Finalizado',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
        ];

        \DB::table('situacao')->insert($rolls);
    }
}
