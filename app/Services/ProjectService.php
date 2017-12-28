<?php

namespace App\Service;

use App\Mail\Participation;
use App\Models\Participant;
use App\Models\Project;
use App\Models\ProjectTechnologies;
use App\Utilities\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProjectService{

    /**
     * @var Project
     */
    protected $project;

    /**
     * @var Participant
     */
    protected $participant;

    /**
     * @var ProjectTechnologies
     */
    protected $projectTechnologies;

    /**
     * ProjectService constructor.
     *
     * @param Project $project
     * @param ProjectTechnologies $projectTechnologies
     * @param Participant $participant
     */
    public function __construct(Project $project, ProjectTechnologies $projectTechnologies, Participant $participant)
    {
        $this->project = $project;
        $this->projectTechnologies = $projectTechnologies;
        $this->participant = $participant;
    }

    /**
     * Method to get all Projects
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(Request $request)
    {
        return $this->project->all();
    }

    /**
     * Method to get Project by id
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->project->find($id);
    }

    /**
     * Method to insert Project in Database
     *
     * @param $data
     * @return array
     */
    public function add($data)
    {
        DB::beginTransaction();

        try{
            $technologies = $data['tecnologias'];
            $participants = $data['participantes'];

            // Removendo os campos que não serão necessários
            unset($data['tecnologias'], $data['participantes']);

            // Adicionando os timestamps
            $data['criado_em'] = date('d/m/Y H:i:s');
            $data['atualizado_em'] = date('d/m/Y H:i:s');

            $project = $this->project->create($data);

            if($project->id){
                foreach($technologies as $technology){
                    $post = [
                        'idtecnologia' => $technology,
                        'idprojeto'    => $project->id
                    ];

                    $this->projectTechnologies->create($post);
                }

                foreach($participants as $participant){
                    $post = [
                        'idprojeto'    => $project->id,
                        'idusuario' => 1,
                        'solicitapart' => 'pen',
                        'criado_em' => $data['criado_em'],
                        'atualizado_em' => $data['atualizado_em'],
                        'token'         => Str::random()
                    ];

                    $new = $this->participant->create($post);

                    $post = [
                        'nmprojeto'      => $project->nmprojeto,
                        'nmparticipante' => $new->user->nome,
                        'token'          => $new->token
                    ];

                    Mail::to($new->user)->send(new Participation($post));
                }

                DB::commit();
                return ['status' => '00', 'id' => $project->id];
            }
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}