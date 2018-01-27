@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="project-page">
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

            <div class="actions space-bottom-15 text-right">
                <button class="confirm-button space-right-4">Editar tarefa <i class="fa fa-edit"></i></button>
                <button class="confirm-button">Editar etapa atual <i class="fa fa-edit"></i></button>
            </div>

            <div class="card min-width-100 padding-12 inline-block space-right-8 align-top">
                <div class="card-header">
                    <h3 class="padding-4">
                        Descrição da atividade - <span class="project-color">{{ $task->nmtarefa }} </span>:

                        <i class="fa fa-desktop big right space-top-2"></i>
                    </h3>
                </div>
                <div class="card-body min-width-100 relative">
                    <div class="width-30 space-top-10 inline-block align-top" style="position:relative;margin-right:4px;height:620px">
                        <div class="space-top-15 space-bottom-6">
                            <span class="bold big roboto">Informações das Etapas - <span class="big roboto bold-500">Status Atual</span>:</span>
                        </div>

                        <div class="overflow-auto steps-list" style="max-height:270px;">
                            @foreach($task->steps as $key => $step)
                                <a class="step-information" data-toggle="tooltip" data-placement="right" data-id="{{ $step->id }}" data-name="{{ $step->nmetapa }}" title="{{ App\Utilities\Situation\Arrays::situations($step->idsituacao) }}" style="text-decoration:none !important;">
                                    <div class="block task-step padding-4 table">
                                        <div class="table-row">
                                            <div class="table-cell text-center align-center {{ App\Utilities\Task\Arrays::getClassBySituation($step->idsituacao) }}">
                                                <img src="{{ asset('img/seo-marketing/png/039-code-1.png') }}" alt="" width="60px">
                                            </div>
                                            <div class="table-cell align-center padding-4">
                                                <span class="bold medium roboto">{{ ($key + 1) }}º Etapa - {!! App\Utilities\Task\Arrays::getSpanBySituation($step->idsituacao) !!}</span>
                                                <p>Clique aqui para visualizar todas as informações disponibilizadas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="task-actions space-top-15">
                            <div class="text-left">
                                <span class="bold big roboto">Ações Rápidas - <span class="big roboto bold-500">Atualização de Tarefa</span>:</span>
                            </div>

                            <hr style="margin:3px 0 15px 0;">

                            <div class="block space-bottom-15">
                                <b class="block medium roboto space-bottom-10">Atualização de Status - Etapa Atual:</b>

                                @if($step->idsituacao != 3)
                                    <div class="action background-dark-pink" data-code="3" data-toggle="tooltip" data-placement="top" title="Andamento">
                                        <i class="fa fa-play align-center white"></i>
                                    </div>
                                @endif

                                @if($step->idsituacao != 5)
                                    <div class="action background-dark-yellow" data-code="5" data-toggle="tooltip" data-placement="top" title="Pausada">
                                        <i class="fa fa-pause align-center white"></i>
                                    </div>
                                @endif

                                @if($step->idsituacao != 2)
                                    <div class="action background-red" data-code="2" data-toggle="tooltip" data-placement="top" title="Pendente">
                                        <i class="fa fa-exclamation-triangle align-center white"></i>
                                    </div>
                                @endif

                                @if($step->idsituacao != 6)
                                    <div class="action background-green" data-code="6" data-toggle="tooltip" data-placement="top" title="Finalizada">
                                        <i class="fa fa-thumbs-up align-center white"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="block">
                                <b class="block medium roboto space-bottom-10">Histórico de Atualizações:</b>

                                <div class="action background-violet" data-toggle="tooltip" data-placement="top" title="Adicionar comentário">
                                    <i class="fa fa-comment align-center white"></i>
                                </div>
                                <div class="action background-blue" data-toggle="tooltip" data-placement="top" title="Adicionar tempo gasto">
                                    <i class="fa fa-clock-o align-center white"></i>
                                </div>
                            </div>
                        </div>

                        <div style="position:absolute;bottom:0;right:0" class="padding-4">
                            <span class="block"><b>Completas:</b> 1 de 10</span>
                        </div>
                    </div>
                    <div class="task-definition width-68 padding-12 space-top-10 align-top inline-block">
                        <div class="space-bottom-10">
                            <span class="bold big roboto step-name">Cadastro de Usuários</span> - <span class="big roboto bold-500">Informações gerais</span>:
                        </div>
                        <div class="step-explanation overflow-auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade actual-modal"></div>
@endsection

@section('scripts')
    @include('usuario::projects.back-end.javascript.show-task')
@endsection