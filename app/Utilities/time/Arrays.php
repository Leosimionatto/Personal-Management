<?php

namespace App\Utilities\Time;

class Arrays{

    /**
     * Method to get Date Diff (Today and passed Day)
     *
     * @param $dt
     * @return string
     */
    public static function getTodayDateDiff($dt)
    {
        $result = 'agora mesmo';

        $date = new \DateTime('now');
        $date2 = new \DateTime($dt);

        $dateDiff = $date->diff($date2);

        if($dateDiff->y > 0){
            $result = $dateDiff->y . ' anos atrás';
        }elseif($dateDiff->m > 0){
            $result = $dateDiff->m . ' meses atrás';
        }elseif($dateDiff->d > 0){
            $result = $dateDiff->d . ' dias atrás';
        }elseif($dateDiff->h > 0){
            $result = $dateDiff->h . ' horas atrás';
        }elseif($dateDiff->i > 0){
            $result = $dateDiff->i . ' minutos atrás';
        }elseif($dateDiff->s > 0){
            $result = $dateDiff->s . ' segundos atrás';
        }

        return $result;
    }
}