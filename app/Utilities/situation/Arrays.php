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
            '1' => 'Pendente',
            '2'  => 'Andamento',
            '3'  => 'Revisão',
            '4'  => 'Pausada',
            '5'  => 'Finalizada'
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
            1  => 'Pendente',
            2  => 'Andamento',
            3  => 'Revisão',
            4  => 'Pausada',
            5  => 'Finalizada'
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
            1 => '<label class="label label-danger"> Pendente </label>',
            2  => '<label class="label label-warning"> Andamento </label>',
            3  => '<label class="label label-succes"> Revisão </label>',
            4  => '<label class="label label-danger"> Pausada </label>',
            5  => '<label class="label label-success"> Finalizada </label>'
        ];

        return $array[$param];
    }
}