<?php

namespace App\Utilities\Situation;

class Arrays{
    static function get()
    {
        $array = [
            '1' => 'Pendente',
            '2'  => 'Andamento',
            '3'  => 'Revisão',
            '4'  => 'Pausada',
            '5'  => 'Finalizada'
        ];

        return $array;
    }

    static function situations($param)
    {
        $array = [
            '1' => 'Pendente',
            '2'  => 'Andamento',
            '3'  => 'Revisão',
            '4'  => 'Pausada',
            '5'  => 'Finalizada'
        ];

        foreach($array as $key => $item){
            if($key == $param){
                return $item;
            }
        }
    }

    static function situationsLabel($param)
    {
        $array = [
            '1' => '<label class="label label-primary"> Pendente </label>',
            '2'  => '<label class="label label-warning"> Andamento </label>',
            '3'  => '<label class="label label-danger"> Revisão </label>',
            '4'  => '<label class="label label-info"> Pausada </label>',
            '5'  => '<label class="label label-success"> Finalizada </label>'
        ];

        foreach($array as $key => $item){
            if($key == $param){
                return $item;
            }
        }
    }
}