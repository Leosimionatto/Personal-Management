@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="menu-top card padding-12 space-bottom-15 relative">
            <div class="block">
                <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                <span class="disabled-route-option">Projetos</span>
                <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>
                <div class="dropdown notifications right space-right-15">
                    <div class="notifications-information">
                        <label class="label label-danger">10</label>
                        <i class="fa fa-bell"></i>
                    </div>
                    <ul class="dropdown-menu">
                        <li><b>Status Atualizações</b></li>
                        <li class="divider"></li>
                        <li>Nenhuma notificação recente</li>
                    </ul>
                </div>
                <span class="right disabled-route-option space-right-15">Personal Management</span>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-warning left">Compromissos associados <i class="fa fa-calendar-check-o white"></i></button>
            <button type="button" class="btn btn-primary left space-left-6">Principais acontecimentos <i class="fa fa-calendar-check-o white"></i></button>
            <a href="{{ route('project.create') }}"><button type="button" class="btn btn-primary">Novo projeto <i class="fa fa-plus-circle white"></i></button></a>
        </div>
        <div class="card padding-12 space-top-15 space-bottom-15 projects-list">
            <div class="card-header block space-bottom-15">
                <h3>Projetos em andamento - <span class="title" style="font-size:20px">Administração</span>:</h3>
                Aqui você realiza o gerenciamento completo de seus projetos e idéias de maneira simples e intuitiva. Nunca foi tão fácil gerenciar seus projetos!
            </div>
            <div class="modal-body-height relative" style="height:300px;max-height:380px;">
                <div class="projects-table padding-bottom-10">
                    <table>
                        <thead>
                            <th>Projeto</th>
                            <th>Prioridade</th>
                            <th>Situação</th>
                            <th>Previsão de entrega</th>
                            <th>Mais informações</th>
                        </thead>
                        <tbody>
                            @if(isset($projects) && count($projects) > 0)
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->nmprojeto }}</td>
                                        <td>{!! App\Utilities\Priority\Arrays::priorityLabel($project->idprioridade) !!}</td>
                                        <td>{!! App\Utilities\Situation\Arrays::situationsLabel($project->idsituacao) !!}</td>
                                        <td>{{ isset($project->dtentrega) ? date('d/m/Y', strtotime($project->dtentrega)) : 'Indefinida' }}</td>
                                        <td>
                                            <a href="{{ route('project.show', $project->id) }}">
                                                Informações gerais <i class="fa fa-cogs"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">Nenhum projeto encontrado em nossa base de dados. Para iniciar um novo projeto, basta <a href="{{ route('project.create') }}">clicar aqui</a>!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <span class="block" style="position:absolute;right:5px;bottom:0"><i class="fa fa-calendar-check-o"></i> Situação de seus projetos em {{ date('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        <div class="card padding-12 width-38 inline-block space-right-8">
            <div class="card-header space-bottom-10">
                <h3>Andamento projetos - <span class="title" style="font-size:20px">Estatísticas</span>:</h3>
            </div>
            <div class="card-body overflow-auto">
                <div class="project-progress">
                    <div class="space-bottom-10 space-top-10">
                        <h5>Overtech - <span class="title" style="font-size:15px">Última semana</span>:</h5>
                    </div>
                    <div class="table progress-information">
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas pendentes:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-danger">12</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                33% faltando
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas finalizadas:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-success">32</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                77% completo
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-progress">
                    <div class="space-bottom-10 space-top-10">
                        <h5>Personal Management - <span class="title" style="font-size:15px">Última semana</span>:</h5>
                    </div>
                    <div class="table progress-information">
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas pendentes:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-danger">12</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                33% faltando
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas finalizadas:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-success">32</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                77% completo
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-progress">
                    <div class="space-bottom-10 space-top-10">
                        <h5>Search & Find - <span class="title" style="font-size:15px">Última semana</span>:</h5>
                    </div>
                    <div class="table progress-information">
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas pendentes:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-danger">12</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                33% faltando
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell padding-10 text-center">
                                Tarefas finalizadas:
                            </div>
                            <div class="table-cell padding-10 text-center">
                                <label class="label label-success">32</label>
                            </div>
                            <div class="table-cell padding-10 text-center">
                                77% completo
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card padding-12 width-60 inline-block align-top feed">
            <div class="card-header space-bottom-10">
                <h3>Feed de notícias - <span class="title" style="font-size:20px">Geral</span>:</h3>
            </div>
            <div class="card-body overflow-auto">
                <div class="project-action-body">
                    <div class="project-action-user-image inline-block width-10 text-center align-top">
                        <img src="{{ asset('img/profile-image-1.png') }}" width="90%">
                    </div>
                    <div class="project-action inline-block width-85">
                        <span class="right">
                            <i class="fa fa-code-fork"></i>
                        </span>
                            <span class="block">
                            <i class="fa fa-calendar-check-o"></i> 4 horas atrás
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-flag"></i>
                            <a href="">Search & Find - Módulo de Usuários</a>
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-info-circle"></i>
                            Foram realizadas correções no módulo de usuários de forma a possibilitar um melhor funcionamento do mesmo...
                        </span>
                    </div>
                </div>
                <div class="project-action-body">
                    <div class="project-action-user-image inline-block width-10 text-center align-top">
                        <img src="{{ asset('img/profile-image-1.png') }}" width="90%">
                    </div>
                    <div class="project-action inline-block width-85">
                        <span class="right">
                            <i class="fa fa-code-fork"></i>
                        </span>
                            <span class="block">
                            <i class="fa fa-calendar-check-o"></i> 6 horas atrás
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-flag"></i>
                            <a href="">Overtech - Módulo de Usuários</a>
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-info-circle"></i>
                            Foram realizadas correções no módulo de usuários de forma a possibilitar um melhor funcionamento do mesmo...
                        </span>
                    </div>
                </div>
                <div class="project-action-body">
                    <div class="project-action-user-image inline-block width-10 text-center align-top">
                        <img src="{{ asset('img/profile-image-1.png') }}" width="90%">
                    </div>
                    <div class="project-action inline-block width-85">
                        <span class="right">
                            <i class="fa fa-code"></i>
                        </span>
                            <span class="block">
                            <i class="fa fa-calendar-check-o"></i> 14 horas atrás
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-flag"></i>
                            <a href="">Personal Management - Módulo de Usuários</a>
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-info-circle"></i>
                            Foram realizadas correções no módulo de usuários de forma a possibilitar um melhor funcionamento do mesmo...
                        </span>
                    </div>
                </div>
                <div class="project-action-body">
                    <div class="project-action-user-image inline-block width-10 text-center align-top">
                        <img src="{{ asset('img/profile-image-1.png') }}" width="90%">
                    </div>
                    <div class="project-action inline-block width-85">
                        <span class="right">
                            <i class="fa fa-code-fork"></i>
                        </span>
                            <span class="block">
                            <i class="fa fa-calendar-check-o"></i> 2 dias atrás
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-flag"></i>
                            <a href="">Personal Management - Módulo de Usuários</a>
                        </span>
                            <span class="block action-information">
                            <i class="fa fa-info-circle"></i>
                            Foram realizadas correções no módulo de usuários de forma a possibilitar um melhor funcionamento do mesmo...
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection