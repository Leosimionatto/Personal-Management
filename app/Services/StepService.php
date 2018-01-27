<?php

namespace App\Services;

use App\Models\Step;
use App\Models\StepHist;
use App\Utilities\Situation\Arrays as Situation;
use App\Notifications\StepSituationUpdate;
use Illuminate\Support\Facades\DB;

class StepService{

    /**
     * @var Step
     */
    protected $step;

    /**
     * @var StepHist
     */
    protected $stepHist;

    /**
     * StepService constructor.
     *
     * @param Step $step
     * @param StepHist $stepHist
     */
    public function __construct(Step $step, StepHist $stepHist)
    {
        $this->step = $step;
        $this->stepHist = $stepHist;
    }

    /**
     * Method to get Step Information
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->step->find($id);
    }

    /**
     * Method to update Step Status
     *
     * @param $data
     * @return array
     */
    public function updateSituation($data)
    {
        DB::beginTransaction();
        try{
            $id = $data['idetapa'];
            $step = $this->step->find($id);

            unset($data['idetapa']);

            if($step->update($data)){
                $task = $step->task;

                $hist = [
                    'idetapa' => $id,
                    'descricao' => 'Alterada para ' . Situation::situations($data['idsituacao']) . ' por <b>' . $task->participant->user->nome . '</b>',
                    'idparticipante' => $task->participant->id,
                    'criado_em' => date('d/m/Y H:i:s'),
                    'atualizado_em' => date('d/m/Y H:i:s'),
                ];

                $new = $this->stepHist->create($hist);

                if(is_object($new) && !empty($new)){
                    $data = [
                        'idprojeto' => $task->idprojeto,
                        'idsituacao' => $data['idsituacao'],
                        'idetapa'    => $id
                    ];

                    $task->assigner->notify(new StepSituationUpdate($data));
                    $task->participant->user->notify(new StepSituationUpdate($data));

                    DB::commit();
                    return ['status' => '00'];
                }
                DB::rollback();
                return ['status' => '01', 'message' => 'Ocorreu um erro! Caso o erro persista, favor entrar em contato com o administrador.'];
            }
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}