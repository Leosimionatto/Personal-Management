<?php

namespace App\Services;

use App\Models\Step;
use App\Models\Task;
use App\Notifications\ParticipantTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskService{

    /**
     * @var Task
     */
    protected $task;

    /**
     * @var Step
     */
    protected $step;

    /**
     * TaskService constructor.
     *
     * @param Task $task
     * @param Step $step
     */
    public function __construct(Task $task, Step $step)
    {
        $this->task = $task;
        $this->step = $step;
    }

    /**
     * Method to get all Project tasks
     *
     * @param $id
     * @param $group
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($id, $group)
    {
        return $this->task->where('idprojeto', $id)->where('idgrupo', $group)->paginate();
    }

    /**
     * Method to get Task Information
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->task->find($id);
    }

    /**
     * Method to add an Task
     *
     * @param $data
     * @return array
     */
    public function add($data)
    {
        DB::beginTransaction();
        try{
            $steps = json_decode($data['etapas']);

            $data['idsituacao'] = 1;
            $data['idgrupo'] = 1;
            $data['qtdetapas'] = count($steps);
            $data['criado_em'] = date('Y-m-d H:i:s');
            $data['atualizado_em'] = date('Y-m-d H:i:s');
            $data['idatribuidor'] = Auth::guard('user')->user()->id;

            unset($data['etapas']);

            $new = $this->task->create($data);

            if($new->id){
                foreach($steps as $step){
                    $post = [
                        'nmetapa' => $step->nmetapa,
                        'idtarefa' => $new->id,
                        'idsituacao' => 1,
                        'descricao' => $step->descricao,
                        'criado_em' => $data['criado_em'],
                        'atualizado_em' => $data['atualizado_em'],
                    ];

                    $this->step->create($post);
                }

                $new->participant->user->notify(new ParticipantTask($new));

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'Ocorreu um erro! Caso o erro persista favor contatar o administrador.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}