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
                            @foreach(App\Utilities\Priority\Arrays::get() as $key => $priority)
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

                    <div class="steps-list">
                        <div class="step-information space-top-10 space-bottom-10">
                            <span class="block">
                                <span class="big roboto bold">Etapa - <span class="green-color roboto big bold-500">Informações Gerais (Nome e Descrição)</span></span>

                                <i class="fa fa-cube big space-top-2 right"></i>
                            </span>

                            <hr style="margin:3px 0 3px 0;">

                            <div class="form-group">
                                <label for="nome" class="form-label">Nome da etapa</label>
                                <input type="text" name="nome" class="form-control required" id="nome" placeholder="Qual a etapa?">
                            </div>

                            <div class="form-group">
                                <label for="descricao" class="form-label">Descrição da etapa</label>

                                <div class="summernote-container">
                                    <textarea name="descricao" class="form-control summernote form-text-area required-summernote" id="descricao" placeholder="Qual a descriçao da etapa?"></textarea>
                                </div>
                            </div>

                            <div class="step-actions text-right block" style="margin:10px 0 15px 0 !important;">
                                <button class="btn btn-primary left add-step" style="margin:0;">Adicionar etapa <i class="fa fa-puzzle-piece white"></i></button>
                                <button class="btn btn-warning remove-step" style="margin-left:0 !important;">Remover etapa <i class="fa fa-remove white"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::projects.back-end.javascript.new-task')
@endsection