<?php

namespace App\Utilities\Participant;

class Arrays{

    /**
     * Method to get Request Status Name by Status Code
     *
     * @param $status
     * @return mixed
     */
    public static function getRequestStatusLabel($status)
    {
        $array = [
            'ace' => '<label class="label label-success">Aceito</label>',
            'rec' => '<label class="label label-danger">Recusado</label>',
            'pen' => '<label class="label label-warning">Pendente</label>'
        ];

        return $array[$status];
    }

    /**
     * Method to get Status Name by Status Code
     *
     * @param $status
     * @return mixed
     */
    public static function getStatusLabel($status)
    {
        $array = [
            'ati' => '<label class="label label-success">Ativo</label>',
            'ina' => '<label class="label label-danger">Inativo</label>',
        ];

        return $array[$status];
    }

    /**
     * Method to get Status Name by Status Code
     *
     * @param $status
     * @return mixed
     */
    public static function getStatus($status)
    {
        $array = [
            'ati' => 'Ativo',
            'ina' => 'Inativo',
        ];

        return $array[$status];
    }

    /**
     * Method to get an list of Status
     *
     * @return mixed
     */
    public static function statusList()
    {
        $array = [
            'ati' => 'Ativo',
            'ina' => 'Inativo',
        ];

        return $array;
    }
}