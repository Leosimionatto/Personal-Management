<?php

use Illuminate\Database\Seeder;

class TechnologyTableSeeder extends Seeder
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
                'nome' => 'Laravel',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            1 => [
                'nome' => 'HTML5',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            2 => [
                'nome' => 'CSS3',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            3 => [
                'nome' => 'Zend Framework',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            4 => [
                'nome' => 'AngularJS',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            5 => [
                'nome' => 'Angular 2',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
            6 => [
                'nome' => 'NodeJS',
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ],
        ];

        \DB::table('tecnologia')->insert($rolls);
    }
}
