<?php

namespace App\Services;

use App\Models\Participant;
use App\Models\Step;
use App\Models\StepHist;
use App\Notifications\CommentViewer;
use App\Utilities\Situation\Arrays as Situation;
use App\Notifications\StepSituationUpdate;
use Illuminate\Support\Facades\Auth;
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
     * @var Participant
     */
    protected $participant;

    /**
     * StepService constructor.
     *
     * @param Step $step
     * @param StepHist $stepHist
     * @param Participant $participant
     */
    public function __construct(Step $step, StepHist $stepHist, Participant $participant)
    {
        $this->step = $step;
        $this->stepHist = $stepHist;
        $this->participant = $participant;
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
     * Method to add an Step Comment
     *
     * @param $data
     * @return array
     */
    public function createComment($data)
    {
        DB::beginTransaction();
        try{
            $participant = $this->participant->all()->where('idusuario', Auth::guard('user')->user()->id)->first();

            $post = [
                'idetapa' => $data['idetapa'],
                'descricao' => $data['descricao'],
                'idparticipante' => $participant->id,
                'idvisualizador' => (!empty($data['idvisualizador'])) ? $data['idvisualizador'] : null,
                'criado_em' => date('d/m/Y H:i:s'),
                'atualizado_em' => date('d/m/Y H:i:s'),
            ];

            $new = $this->stepHist->create($post);

            if(!empty($new->id)){
                if(!empty($data['idvisualizador'])){
                    $post = [
                        'idparticipante' => $participant->id,
                        'idvisualizador' => $data['idvisualizador'],
                        'idtarefa' => $new->step->task->id
                    ];

                    $user = $this->participant->find($data['idvisualizador'])->user;

                    $user->notify(new CommentViewer($post));
                }

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'Ocorreu um erro! Caso o erro persista, contate um administrador.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
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
            $task = $step->task;

            unset($data['idetapa']);

            $participant = $this->participant->all()->where('idusuario', Auth::guard('user')->user()->id)->first();
            $active = $this->step->all()->where('idtarefa', $step->idtarefa)->where('idsituacao', '!=', 1)->where('idsituacao', '!=', 2)->where('id', '!=', $step->id);

            if($participant->id != $task->idparticipante && $participant->id != $task->idatribuidor){
                DB::rollback();
                return ['status' => '01', 'message' => 'Somente o participante responsável pela tarefa pode alterar o <b>Status</b> da mesma.'];
            }

            if(count($active) > 0){
                DB::rollback();
                return ['status' => '01', 'message' => 'Não foi possível realizar essa ação pois já existem etapas ativas'];
            }

            if($step->update($data)){
                $hist = [
                    'idetapa' => $id,
                    'descricao' => 'Alterada para ' . Situation::situations($data['idsituacao']) . ' por <b>' . $participant->user->nome . '</b>',
                    'idparticipante' => $participant->id,
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

                    $assigner = $task->assigner;
                    $user = $task->participant->user;

                    $assigner->notify(new StepSituationUpdate($data));

                    if($user->id != $assigner->id){
                        $user->notify(new StepSituationUpdate($data));
                    }

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