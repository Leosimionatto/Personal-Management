@extends('usuario::layouts.app')

@section('content')
    <div class="projects">
        <div class="project-page text-center">
            <div class="menu-top text-left card padding-12 space-bottom-15 relative">
                <div class="block">
                    <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
                    <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
                    <span class="disabled-route-option">Visualização projeto</span>
                    <span class="right sign-out disabled-route-option">Sair <i class="fa fa-sign-out"></i></span>

                    @include('usuario::layouts.notification')

                    <span class="right disabled-route-option space-right-15">Personal Management</span>
                </div>
            </div>
            <div class="project-page-actions text-left">
                <a href="{{ route('project.management', $project->id) }}"><button type="button" class="btn btn-primary">Informações gerais <i class="fa fa-handshake-o"></i></button></a>
                <button type="button" class="btn btn-primary right"><a href="">Desenvolvimento <i class="fa fa-laptop"></i></a></button>
                <button type="button" class="btn btn-primary right space-right-6">Design <i class="fa fa-paint-brush"></i></button>
            </div>
            <div class="card padding-12 space-top-15 space-bottom-15 text-left">
                <div class="project-page-participant-tasks">
                    <div class="card-header">
                        <i class="fa fa-bookmark right"></i>
                        <h4>Lista de tarefas - <span class="title">Entrega próxima</span>:</h4>
                    </div>
                    <div class="tasks space-top-6">
                        <table>
                            <thead>
                            <tr>
                                <th>Número tarefa</th>
                                <th>Status</th>
                                <th>Porcentagem</th>
                                <th>Data de entrega</th>
                                <th>Mais informações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#1</td>
                                <td><label class="label label-danger">Urgente</label></td>
                                <td>
                                    <progress value="65" max="100">65%</progress>
                                    <span class="block progress-value">65%</span>
                                </td>
                                <td>02/07/2017</td>
                                <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                            </tr>
                            <tr>
                                <td>#2</td>
                                <td><label class="label label-danger">Urgente</label></td>
                                <td>
                                    <progress value="20" max="100">20%</progress>
                                    <span class="block progress-value">20%</span>
                                </td>
                                <td>04/07/2017</td>
                                <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                            </tr>
                            <tr>
                                <td>#3</td>
                                <td><label class="label label-danger">Urgente</label></td>
                                <td>
                                    <progress value="5" max="100">5%</progress>
                                    <span class="block progress-value">5%</span>
                                </td>
                                <td>06/07/2017</td>
                                <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                            </tr>
                            <tr>
                                <td>#4</td>
                                <td><label class="label label-warning">Importante</label></td>
                                <td>
                                    <progress value="0" max="100">0%</progress>
                                    <span class="block progress-value">0%</span>
                                </td>
                                <td>15/07/2017</td>
                                <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                            </tr>
                            <tr>
                                <td>#5</td>
                                <td><label class="label label-warning">Importante</label></td>
                                <td>
                                    <progress value="0" max="100">0%</progress>
                                    <span class="block progress-value">0%</span>
                                </td>
                                <td>15/07/2017</td>
                                <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <button type="button" class="btn btn-info">Visualizar tarefas <i class="fa fa-code"></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="project-events card width-60 padding-12 inline-block space-right-8 align-top text-left">
                <div class="card-header">
                    <i class="fa fa-calendar-check-o right"></i>
                    <h4>Agenda do projeto - <span class="title">Compromissos agendados</span>:</h4>
                </div>
                <div class="events">
                    <div class="table">
                        <div class="table-row">
                            <div class="table-cell width-15 text-center" style="padding-top:0">
                                <img src="{{ asset('img/business-and-office/png/024-communication.png') }}" width="75%" alt="">
                            </div>
                            <div class="table-cell" style="padding-top:0">
                                <span class="block small right">17/07/2017 às 18:30 hrs <i class="fa fa-clock-o"></i></span>
                                <span class="block space-bottom-2"><b>Evento:</b> Reunião</span>
                                <span class="block space-bottom-2"><b>Prioridade:</b> <label class="label label-danger">Máxima</label></span>
                                <span class="block space-bottom-2"><b>Descrição:</b> Evento com a finalidade de realizar o esclarecimento de algumas informações referentes ao projeto em questão.</span>
                            </div>
                        </div>
                        <div class="table-row">
                            <div class="table-cell width-15 text-center align-top">
                                <img src="{{ asset('img/business-and-office/png/005-exchange.png') }}" width="75%" alt="">
                            </div>
                            <div class="table-cell">
                                <span class="block small right">22/08/2017 às 18:30 hrs <i class="fa fa-clock-o"></i></span>
                                <span class="block space-bottom-2"><b>Evento:</b> Apresentação</span>
                                <span class="block space-bottom-2"><b>Prioridade:</b> <label class="label label-danger">Máxima</label></span>
                                <span class="block space-bottom-2"><b>Descrição:</b> Apresentação do sistema para o cliente com o intuito de verificar se haverá, ou não, mudanças no projeto como um todo, ou seja, mudança
            de requisitos, funcionalidades, etc.</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-top-2 text-right">
                        <button type="button" class="btn btn-warning">Requisitar dispensa <i class="fa fa-hand-stop-o"></i></button>
                        <button type="button" class="btn btn-primary space-left-4">Verificar os compromissos <i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
            <div class="card padding-12 width-38 inline-block align-top text-left">
                <div class="card-header">
                    <i class="fa fa-heartbeat right"></i>
                    <h4>Lista de participantes - <span class="title">Situação atual</span>:</h4>
                </div>
                <div class="participant">
                    <div class="table padding-10">
                        <div class="table-row">
                            <div class="table-cell width-15 text-center align-center">
                                <img src="{{ asset('img/profile-image-2.png') }}" width="65px" alt="Participante">
                            </div>
                            <div class="table-cell align-middle">
                                <span class="block"><b>Nome:</b> Gilberto Giro Resende</span>
                                <span class="block"><b>Função:</b> Desenvolvedor</span>
                                <span class="block"><b>Atividades pendentes:</b> 5 atividades</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="participant">
                    <div class="table padding-10">
                        <div class="table-row">
                            <div class="table-cell width-15 text-center align-center">
                                <img src="{{ asset('img/profile-image-1.png') }}" width="65px" alt="Participante">
                            </div>
                            <div class="table-cell align-middle">
                                <span class="block"><b>Nome:</b> Gilberto Giro Resende</span>
                                <span class="block"><b>Função:</b> Desenvolvedor</span>
                                <span class="block"><b>Atividades pendentes:</b> 5 atividades</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
