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
        $rows = [
            0 => [
                'id'          => 1,
                'codsituacao' => 'nin',
                'nmsituacao'  => 'Não iniciado',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            1 => [
                'id'          => 2,
                'codsituacao' => 'pen',
                'nmsituacao'  => 'Pendente',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            2 => [
                'id'          => 3,
                'codsituacao' => 'and',
                'nmsituacao'  => 'Andamento',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            3 => [
                'id'          => 4,
                'codsituacao' => 'rev',
                'nmsituacao'  => 'Revisão',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            4 => [
                'id'          => 5,
                'codsituacao' => 'pau',
                'nmsituacao'  => 'Pausado',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
            5 => [
                'id'          => 6,
                'codsituacao' => 'fin',
                'nmsituacao'  => 'Finalizado',
                'criado_em'   => date('Y-m-d'),
                'atualizado_em'   => date('Y-m-d')
            ],
        ];

        foreach($rows as $situation){
            $sit = DB::table('situacao')->where('id', $situation['id'])->first();

            if(empty($sit->id)){
                DB::table('situacao')->insert($situation);
            }else{
                DB::table('situacao')->where('id', $situation['id'])->update($situation);
            }
        }
    }
}
