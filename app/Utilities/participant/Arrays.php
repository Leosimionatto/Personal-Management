<?php

namespace App\Utilities\Participant;

class Arrays{

    /**
     * Method to get Status Name by Status Code
     *
     * @param $status
     * @return mixed
     */
    public static function getStatusLabel($status)
    {
        $array = [
            'ace' => '<label class="label label-success">Aceito</label>',
            'rec' => '<label class="label label-danger">Recusado</label>',
            'pen' => '<label class="label label-warning">Pendente</label>'
        ];

        return $array[$status];
    }
}