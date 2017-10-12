<?php

namespace App\Service;

use App\Models\Participant;
use App\Models\Project;
use App\Models\ProjectTechnologies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectService{

    protected $project;
    protected $participant;
    protected $projectTechnologies;

    public function __construct(Project $project, ProjectTechnologies $projectTechnologies, Participant $participant)
    {
        $this->project = $project;
        $this->projectTechnologies = $projectTechnologies;
        $this->participant = $participant;
    }

    /*
     * Get all projects
     */
    public function all(Request $request)
    {
        return $this->project->all();
    }

    /*
     * Get project by ID
     */
    public function get($id)
    {
        return $this->project->find($id);
    }

    /*
     * Add project in database
     */
    public function add($data)
    {
        DB::beginTransaction();

        try{
            // Removendo os campos que não serão necessários
            $technologies = $data['tecnologias'];
            $participants = $data['participantes'];
            $participants = ['1'];

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
                        'atualizado_em' => $data['atualizado_em']
                    ];

                    $this->participant->create($post);
                }

                DB::commit();
                return ['status' => '00', 'message' => 'Procedimento realizado com sucesso!'];
            }
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}