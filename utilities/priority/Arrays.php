<?php

namespace Utilities\Priority;

class Arrays{
    static function get()
    {
        $array = [
            '1' => 'Indefinida',
            '2' => 'Mínima',
            '3' => 'Média',
            '4' => 'Máxima'
        ];

        return $array;
    }
    static function priority($param)
    {
        $array = [
            '1' => 'Indefinida',
            '2' => 'Mínima',
            '3' => 'Média',
            '4' => 'Máxima'
        ];

        foreach($array as $key => $item){
            if($key == $param){
                return $item;
            }
        }
    }

    static function priorityLabel($param)
    {
        $array = [
            '1' => '<label class="label label-primary"> Indefinida </label>',
            '2' => '<label class="label label-success"> Mínima </label>',
            '3' => '<label class="label label-warning"> Média </label>',
            '4' => '<label class="label label-danger"> Máxima </label>'
        ];

        foreach($array as $key => $item){
            if($key == $param){
                return $item;
            }
        }
    }
}