<?php

namespace App\Utilities\Task;

class Arrays{

    /**
     * Method to get Span by Situation
     *
     * @param $situation
     * @return mixed
     */
    public static function getSpanBySituation($situation)
    {
        $array = [
            1 => '<span class="red-color medium roboto">Pendente</span>',
            2 => '<span class="yellow-color medium roboto">Andamento</span>',
            3 => '<span class="green-color medium roboto">Revisão</span>',
            4 => '<span class="red-color medium roboto">Pausada</span>',
            5 => '<span class="green-color medium roboto">Finalizada</span>',
        ];

        return $array[$situation];
    }

    /**
     * Method to get Title By Situation
     *
     * @param $situation
     * @return mixed
     */
    public static function getClassBySituation($situation)
    {
        $array = [
            1 => 'disabled',
            2 => 'pendent',
            3 => 'actived',
            4 => 'disabled',
            5 => 'actived'
        ];

        return $array[$situation];
    }

}