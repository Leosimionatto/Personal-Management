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
                <a href="{{ route('project.back-end', $project->id) }}"><button type="button" class="btn btn-primary right">Grupo Back-end <i class="fa fa-laptop"></i></button></a>
                <button type="button" class="btn btn-primary right space-right-6">Grupo Front-end <i class="fa fa-paint-brush"></i></button>
            </div>

            <div class="card width-23 space-right-8 space-left-8 space-top-15 space-bottom-15 inline-block padding-12 align-top">
                <div class="card-header text-left padding-4">
                    <h3>
                        Front-end - <span class="project-color">Status</span>

                        <i class="fa fa-paint-brush right"></i>
                    </h3>
                </div>

                <div class="card-body padding-10">
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
                        Geral - <span class="project-color">Finalizadas</span>

                        <i class="fa fa-leaf right"></i>
                    </h3>
                </div>

                <div class="card-body padding-10">
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
                        Geral - <span class="project-color">Pausadas</span>

                        <i class="fa fa-thumb-tack right"></i>
                    </h3>
                </div>

                <div class="card-body padding-10">
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
                        Geral - <span class="project-color">Pendentes</span>

                        <i class="fa fa-exclamation-triangle right"></i>
                    </h3>
                </div>

                <div class="card-body padding-10">
                    <div class="chart space-bottom-6 space-top-6">
                        <input type="text" id="pending-activities" value="25" disabled>
                    </div>

                    <h4><b class="big underline">Tarefas Pendentes</b></h4>
                    <p class="block space-top-6">Porcentual de tarefas que estão com status <b>pendente</b> e/ou <b>não iniciado</b>.</p>
                </div>
            </div>

            <div class="width-48 inline-block align-top">
                <div class="card width-48 text-left space-right-6 padding-12 space-bottom-15 align-top inline-block">
                    <div class="card-header padding-4">
                        <h3>
                            Front-end

                            <i class="fa fa-paint-brush space-top-2 big right"></i>
                        </h3>
                    </div>

                    <div class="card-body padding-10 text-center">
                        <div class="chart space-top-6 space-bottom-6">
                            <input type="text" id="front-end-participants" value="25">
                        </div>

                        <h4><b class="big underline">Horas Trabalhadas</b></h4>
                        <p class="block space-top-6">Porcentual de horas que utilizadas durante o período de desenvolvimento das atividades.</p>
                    </div>
                </div>

                <div class="card width-48 text-left space-left-6 padding-12 space-bottom-15 align-top inline-block">
                    <div class="card-header padding-4">
                        <h3>
                            Back-end

                            <i class="fa fa-laptop space-top-2 big right"></i>
                        </h3>
                    </div>

                    <div class="card-body padding-10 text-center">
                        <div class="chart space-top-6 space-bottom-6">
                            <input type="text" id="back-end-participants" value="75">
                        </div>

                        <h4><b class="big underline">Horas Trabalhadas</b></h4>
                        <p class="block space-top-6">Porcentual de horas que utilizadas durante o período de desenvolvimento das atividades.</p>
                    </div>
                </div>

                <div class="card width-48 text-left space-right-6 padding-12 space-bottom-15 align-top inline-block">
                    <div class="card-header">
                        <h3>
                            Sua participação

                            <i class="fa fa-address-book space-top-2 big right"></i>
                        </h3>
                    </div>
                    <div class="card-body padding-10 text-center">
                        <div class="chart space-top-6 space-bottom-6">
                            <input type="text" id="user-participation" value="25">
                        </div>

                        <h4><b class="big underline">Horas Trabalhadas</b></h4>
                        <p class="block space-top-6">Porcentual de horas que utilizadas durante o período de desenvolvimento das atividades.</p>
                    </div>
                </div>

                <div class="card width-48 text-left space-left-6 padding-12 space-bottom-15 align-top inline-block">
                    <div class="card-header">
                        <h3>
                            Suas tarefas

                            <i class="fa fa-book space-top-2 big right"></i>
                        </h3>
                    </div>
                    <div class="card-body padding-10 text-center">
                        <div class="chart space-top-6 space-bottom-6">
                            <input type="text" id="user-tasks" value="35">
                        </div>

                        <h4><b class="big underline">Tarefas</b></h4>
                        <p class="block space-top-6">Porcentual de tarefas do projeto, independentemente da situação, com atribuição para você.</p>
                    </div>
                </div>
            </div>

            <div class="width-48 inline-block space-right-10 space-left-10">
                <div class="card width-100 text-left space-left-6 space-right-6 padding-12 inline-block space-bottom-15">
                    <div class="card-header padding-4">
                        <h3>
                            Comparação - <span class="project-color">Back-end VS Front-end</span>

                            <i class="fa fa-area-chart right"></i>
                        </h3>
                    </div>

                    <div class="card-body padding-12">
                        <div id="front-and-back-end-comparison"></div>
                    </div>
                </div>

                <div class="width-100 padding-12 space-top-15 inline-flex-center">
                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/036-code-3.png') }}" width="75px">
                        <figcaption class="space-top-6"><b>Tarefas Desenvolvidas</b></figcaption>
                    </figure>

                    <i class="fa fa-arrow-right space-right-10" style="font-size:20px"></i>

                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/096-presentation.png') }}" width="75px">
                        <figcaption class="space-top-6"><b>Informações Trabalhadas</b></figcaption>
                    </figure>

                    <i class="fa fa-arrow-right space-right-10" style="font-size:20px"></i>

                    <figure>
                        <img src="{{ asset('img/seo-marketing/png/076-analytics-4.png') }}" width="75px">
                        <figcaption class="space-top-6"><b>Análises viram Gráficos</b></figcaption>
                    </figure>
                </div>
            </div>

            <div class="card padding-12 space-bottom-15 text-left">
                <div class="project-page-participant-tasks">
                    <div class="card-header padding-4">
                        <h3>
                            Lista de tarefas - <span class="project-color">Entrega próxima</span>:

                            <i class="fa fa-bookmark right"></i>
                        </h3>
                    </div>
                    <div class="card-body padding-10 tasks space-top-6 space-bottom-15">
                        <table>
                            <thead class="background-dark-green">
                                <tr>
                                    <th class="padding-12 medium white bold-500"><i class="fa fa-list-ol white"></i> Número tarefa</th>
                                    <th class="padding-12 medium white bold-500"><i class="fa fa-list-ol white"></i> Status</th>
                                    <th class="padding-12 medium white bold-500"><i class="fa fa-percent white"></i> Porcentagem</th>
                                    <th class="padding-12 medium white bold-500"><i class="fa fa-users white"></i> Grupo</th>
                                    <th class="padding-12 medium white bold-500"><i class="fa fa-book white"></i> Mais informações</th>
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
                                    <td>Front-end</td>
                                    <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td><label class="label label-danger">Urgente</label></td>
                                    <td>
                                        <progress value="20" max="100">20%</progress>
                                        <span class="block progress-value">20%</span>
                                    </td>
                                    <td>Back-end</td>
                                    <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#3</td>
                                    <td><label class="label label-danger">Urgente</label></td>
                                    <td>
                                        <progress value="5" max="100">5%</progress>
                                        <span class="block progress-value">5%</span>
                                    </td>
                                    <td>Back-end</td>
                                    <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#4</td>
                                    <td><label class="label label-warning">Importante</label></td>
                                    <td>
                                        <progress value="0" max="100">0%</progress>
                                        <span class="block progress-value">0%</span>
                                    </td>
                                    <td>Front-end</td>
                                    <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#5</td>
                                    <td><label class="label label-warning">Importante</label></td>
                                    <td>
                                        <progress value="0" max="100">0%</progress>
                                        <span class="block progress-value">0%</span>
                                    </td>
                                    <td>Back-end</td>
                                    <td><a href="">Visualizar tarefa <i class="fa fa-check"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="confirm-button space-top-6">Visualizar Tarefas Back-end <i class="fa fa-laptop"></i></button>
                    <button type="button" class="confirm-button space-top-6 space-left-4">Visualizar Tarefas Front-end <i class="fa fa-paint-brush"></i></button>
                </div>
            </div>

            <div class="project-events card width-60 padding-12 inline-block space-right-8 align-top text-left" style="height:405px;">
                <div class="card-header padding-4">
                    <h3>
                        Agenda do projeto - <span class="project-color">Compromissos agendados</span>:

                        <i class="fa fa-calendar-check-o right"></i>
                    </h3>
                </div>

                <div class="card-body space-top-10 overflow-auto" style="height:285px">
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
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="button" class="warning-button space-top-6">Requisitar dispensa <i class="fa fa-hand-stop-o"></i></button>
                    <button type="button" class="confirm-button space-top-6 space-left-4">Verificar os compromissos <i class="fa fa-check"></i></button>
                </div>
            </div>

            <div class="card padding-12 width-38 inline-block align-top text-left" style="height:405px;">
                <div class="card-header padding-4">
                    <h3>
                        Participantes - <span class="project-color">Situação atual</span>:

                        <i class="fa fa-heartbeat right"></i>
                    </h3>
                </div>
                <div class="card-body space-top-10 space-bottom-15 overflow-auto" style="max-height:270px">
                    @foreach($project->participants as $participant)
                        <div class="participant">
                            <div class="table padding-10">
                                <div class="table-row">
                                    <div class="table-cell width-15 text-center align-center">
                                        <img src="{{ asset('img/sem-foto.png') }}" width="65px" alt="Participante">
                                    </div>
                                    <div class="table-cell align-middle">
                                        <span class="block"><b>Nome:</b> {{ $participant->user->nome }}</span>
                                        <span class="block"><b>Função:</b> {{ App\Utilities\Post\Arrays::getPost($participant->idcargo) }}</span>
                                        <span class="block"><b>Atividades pendentes:</b> 5 atividades</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('project.participant', $project->id) }}">
                        <button class="confirm-button space-top-10" style="padding:6px">Lista de Participantes <i class="fa fa-users"></i></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::projects.javascript.show')
    <script src="{{ asset('js/knob/jquery.knob.min.js') }}"></script>
@endsection