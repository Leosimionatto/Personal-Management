<?php

namespace App\Utilities\Situation;

class Arrays{
    /**
     * Method to get all Situations
     *
     * @return array
     */
    public static function get()
    {
        $array = [
            1  => 'Não iniciado',
            2  => 'Pendente',
            3  => 'Andamento',
            4  => 'Revisão',
            5  => 'Pausada',
            6  => 'Finalizada'
        ];

        return $array;
    }

    /**
     * Method to get specific Situation
     *
     * @param $param
     * @return mixed
     */
    public static function situations($param)
    {
        $array = [
            1  => 'Não iniciado',
            2  => 'Pendente',
            3  => 'Andamento',
            4  => 'Revisão',
            5  => 'Pausada',
            6  => 'Finalizada'
        ];

        return $array[$param];
    }

    /**
     * Method to get Situation Label
     *
     * @param $param
     * @return mixed
     */
    static function situationsLabel($param)
    {
        $array = [
            1 => '<label class="label label-warning"> Não iniciado </label>',
            2 => '<label class="label label-danger"> Pendente </label>',
            3  => '<label class="label label-warning"> Andamento </label>',
            4  => '<label class="label label-succes"> Revisão </label>',
            5  => '<label class="label label-danger"> Pausada </label>',
            6  => '<label class="label label-success"> Finalizada </label>'
        ];

        return $array[$param];
    }
}