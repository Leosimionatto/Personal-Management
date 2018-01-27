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
            1 => '<span class="dark-yellow-color medium roboto">Não iniciada</span>',
            2 => '<span class="red-color medium roboto">Pendente</span>',
            3 => '<span class="dark-yellow-color medium roboto">Andamento</span>',
            4 => '<span class="green-color medium roboto">Revisão</span>',
            5 => '<span class="red-color medium roboto">Pausada</span>',
            6 => '<span class="green-color medium roboto">Finalizada</span>'
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
            1 => 'pendent',
            2 => 'disabled',
            3 => 'pendent',
            4 => 'actived',
            5 => 'disabled',
            6 => 'actived'
        ];

        return $array[$situation];
    }

}