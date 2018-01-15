@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
                <span class="available-route-option"><a href="{{ route('project.show', $project->id) }}">{{ $project->nmprojeto }} <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Grupo Back-end</span>
                <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>

                @include('usuario::layouts.notification')

                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-warning left">Chat do Grupo <i class="fa fa-comments white"></i></button>
            <button type="button" class="btn btn-primary left space-left-6">Principais acontecimentos <i class="fa fa-calendar-check-o white"></i></button>
            <a href="{{ route('project.task.create', $project->id) }}"><button type="button" class="btn btn-primary">Nova tarefa <i class="fa fa-plus-circle white"></i></button></a>
        </div>

        <div class="card width-23 space-right-8 space-left-8 space-top-15 space-bottom-15 inline-block padding-12 align-top">
            <div class="card-header text-left padding-4">
                <h3>
                    Grupo - <span class="project-color">Status</span>

                    <i class="fa fa-paint-brush right"></i>
                </h3>
            </div>

            <div class="card-body text-center padding-10">
                <div class="chart space-bottom-6 space-top-6">
                    <input type="text" id="front-end-status" value="55" disabled>
                </div>

                <h4><b class="big underline">Tarefas Finalizadas</b></h4>
                <p class="block space-top-6">Porcentual de tarefas que estão com status <b>revisão</b> e/ou <b>finalizado</b>.</p>
            </div>
        </div>

        <div class="card width-23 space-right-8 space-left-8 space-top-15 space-bottom-15 inline-block padding-12 align-top">
            <div class="card-header text-left padding-4">
                <h3>
                    Você - <span class="project-color">Finalizadas</span>

                    <i class="fa fa-leaf right"></i>
                </h3>
            </div>

            <div class="card-body text-center padding-10">
                <div class="chart space-bottom-6 space-top-6">
                    <input type="text" id="finished-activities" value="25" disabled>
                </div>

                <h4><b class="big underline">Tarefas Finalizadas</b></h4>
                <p class="block space-top-6">Porcentual de tarefas que estão com status <b>revisão</b> e/ou <b>finalizado</b>.</p>
            </div>
        </div>

        <div class="card width-23 space-right-8 space-left-8 space-top-15 space-bottom-15 inline-block padding-12 align-top">
            <div class="card-header text-left padding-4">
                <h3>
                    Você - <span class="project-color">Pausadas</span>

                    <i class="fa fa-thumb-tack right"></i>
                </h3>
            </div>

            <div class="card-body text-center padding-10">
                <div class="chart space-bottom-6 space-top-6">
                    <input type="text" id="paused-activities" value="20" disabled>
                </div>

                <h4><b class="big underline">Tarefas Pausadas</b></h4>
                <p class="block space-top-6">Porcentual de tarefas que estão com status <b>pausado</b> (Comentários disponíveis).</p>
            </div>
        </div>

        <div class="card width-23 space-right-8 space-left-8 space-top-15 space-bottom-15 inline-block padding-12 align-top">
            <div class="card-header text-left padding-4">
                <h3>
                    Você - <span class="project-color">Pendentes</span>

                    <i class="fa fa-exclamation-triangle right"></i>
                </h3>
            </div>

            <div class="card-body text-center padding-10">
                <div class="chart space-bottom-6 space-top-6">
                    <input type="text" id="pending-activities" value="25" disabled>
                </div>

                <h4><b class="big underline">Tarefas Pendentes</b></h4>
                <p class="block space-top-6">Porcentual de tarefas que estão com status <b>pendente</b> e/ou <b>não iniciado</b>.</p>
            </div>
        </div>

        <div class="card padding-12">
            <div class="card-header padding-4">
                <h3>
                    Lista de Tarefas - <span class="project-color">Ordenação por Prioridade</span>

                    <i class="fa fa-bookmark big right"></i>
                </h3>
            </div>
            <div class="card-body padding-10">
                <table>
                    <thead class="background-dark-green">
                        <tr>
                            <th class="padding-12 bold-500 white">Nome da Tarefa</th>
                            <th class="padding-12 bold-500 white">Participante Responsável</th>
                            <th class="padding-12 bold-500 white">Prioridade</th>
                            <th class="padding-12 bold-500 white">Entrega</th>
                            <th class="padding-12 bold-500 white">Mais Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($tasks) > 0)
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->nmtarefa }}</td>
                                    <td>{{ $task->participant->user->nome }}</td>
                                    <td>{!! App\Utilities\Priority\Arrays::priorityLabel($task->idprioridade) !!}</td>
                                    <td>{{ (!empty($task->dtentrega)) ? (new \Carbon\Carbon($task->dtentrega))->format('d/m/Y') : 'Indefinido' }}</td>
                                    <td><a href="">Visualizar mais <i class="fa fa-plus-circle"></i></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Nenhum registro encontrado na base de dados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/knob/jquery.knob.min.js') }}"></script>
    @include('usuario::projects.back-end.javascript.index')
@endsection