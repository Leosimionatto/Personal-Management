@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.show', $project->id) }}">{{ $project->nmprojeto }} <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.back-end', $project->id) }}">Grupo Back-end <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Adicionar Tarefa</span>
                <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>

                @include('usuario::layouts.notification')

                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>

        <div class="card padding-12">
            <div class="card-header padding-4">
                <h3>
                    Adicionar tarefas - <span class="project-color">Desenvolvimento</span>

                    <i class="fa fa-book big right"></i>
                </h3>
            </div>
            <div class="card-body steps" data-href="">
                <form>
                    <h4>Informações tarefa</h4>

                    <div class="form-group">
                        <label for="nome" class="form-label">Qual a tarefa?</label>
                        <input type="text" name="nmtarefa" class="form-control required" id="nome" placeholder="Tarefa">
                    </div>

                    <div class="form-group">
                        <label for="descricao" class="form-label">Qual a descrição?</label>
                        <textarea name="descricao" class="form-control summernote form-text-area required-summernote" id="descricao" placeholder="Descrição da tarefa"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prioridade" class="form-label">Qual a prioridade</label>
                        <select name="idprioridade" class="form-control required" id="prioridade">
                            <option value="">Prioridade da tarefa</option>
                            @foreach(App\Utilities\Priority\Arrays::get() as $key => $priority){
                                <option value="{{ $key }}">{{ $priority }}</option>;
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="idparticipante" class="form-label">Deseja atribuir essa tarefa a um participante?</label>
                        <select name="idparticipante" class="form-control required" id="idparticipante">
                            <option value="">Atribuição de tarefa</option>
                            @foreach($participants as $participant)
                                <option value="{{ $participant->id }}">{{ $participant->user->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dtentrega" class="form-label">Qual a data de entrega?</label>
                        <input type="date" name="dtentrega" class="form-control" id="dtentrega">
                    </div>
                </form>

                <form>
                    <h4>Informações etapas</h4>

                    <div class="form-divider space-bottom-4 space-top-10">
                        Adicionar Etapa - <span class="title">Informações etapa</span>:
                    </div>

                    <div class="alert alert-warning space-top-10" style="display:block;margin-bottom:4px">
                        <b>Importante!</b> Para adicionar uma nova etapa nesta tarefa, basta seguir o seguinte procedimento:
                        <ol class="space-top-6">
                            <li>Preencher os campos disponibilizados abaixo com informações válidas</li>
                            <li>Clicar em <b>Adicionar etapa</b></li>
                        </ol>
                    </div>

                    <div class="step-information">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome da etapa</label>
                            <input type="text" name="nome" class="form-control step-information-required" id="nome" placeholder="Qual a etapa?">
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="form-label">Descrição da etapa</label>
                            <textarea name="descricao" class="form-control summernote form-text-area step-information-required" id="descricao" placeholder="Qual a descriçao da etapa?"></textarea>
                        </div>
                    </div>

                    <div class="steps-list-actions text-right space-top-10">
                        <button class="btn btn-warning add-step">Adicionar etapa <i class="fa fa-puzzle-piece white"></i></button>
                    </div>

                    <div class="table">
                        <table class="space-bottom-15 space-top-15">
                            <thead style="background-color:#8181B0">
                                <tr>
                                    <th class="padding-12 white">Posição</th>
                                    <th class="white">Nome da etapa</th>
                                    <th class="white">Editar etapa</th>
                                    <th class="white">Excluir etapa</th>
                                </tr>
                            </thead>
                            <tbody class="steps-list">
                                <tr class="without-steps">
                                    <td colspan="4">Nenhuma etapa adicionada</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::projects.back-end.javascript.new-task')
@endsection