@extends('usuario::layouts.app')

@section('content')
    <div class="menu-top card padding-12 space-bottom-15 relative">
        <div class="block">
            <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.show', $id) }}">Visualização Projeto <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.participant', $id) }}">Participantes <i class="fa fa-arrow-right"></i></a></span>
            <span class="disabled-route-option">{{ $user->nome }}</span>
            <span class="right sign-out"><a href="{{ route('logout') }}" class="disabled-route-option">Sair <i class="fa fa-sign-out"></i></a></span>

            @include('usuario::layouts.notification')

            <span class="right disabled-route-option space-right-15">Personal Management</span>
        </div>
    </div>

    <div class="actions space-bottom-15">
        <button class="btn btn-warning space-right-6">Atribuir Compromissos <i class="fa fa-calendar-plus-o white"></i></button>
        <button class="btn btn-warning">Atribuir Tarefas <i class="fa fa-plus-circle white"></i></button>
    </div>

    <div class="card padding-10">
        <div class="card-header padding-4">
            <h3>
                Participante - <span class="project-color">{{ $user->nome }}</span>
            </h3>
            <p style="margin:2px 0 0 0;">Todas as informações do participante em questão, cujo possuem relação com o <b>projeto</b>, são citadas neste momento.</p>
        </div>

        <div class="card-body padding-12 space-bottom-6 space-top-6">
            <div class="inline-block width-10 text-center align-top">
                <img src="{{ asset('img/users/png/user-3.png') }}" width="80px" alt="">
            </div>
            <div class="talk-bubble tri-right left-top align-bottom space-left-4" style="width:88%">
                <div class="message">
                    <i class="fa fa-user-secret black-color right"></i>

                    <span class="block"><b>Nome:</b> {{ $user->nome }}</span>
                    <span class="block"><b>Cargo:</b> {{ App\Utilities\Post\Arrays::getPost($participant->idcargo) }}</span>
                    <span class="block"><b>Status Participante:</b> {!! App\Utilities\Participant\Arrays::getStatusLabel($participant->stparticipante) !!}</span>
                    <span class="block"><b>Situação da Requisição:</b> {!! (!empty($participant->idcargo) || !empty($participant->deveresdesc)) ? '<i class="fa fa-check green-color big" data-toggle="tooltip" data-placement="top" title="Participante Posicionado"></i>' : '<i class="fa fa-remove red-color big" data-toggle="tooltip" data-placement="top" title="Participante Não Posicionado"></i>' !!}</span>
                    <span class="block"><b>Descrição dos Deveres:</b> {{ $participant->deveresdesc }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card width-60 inline-block padding-12 space-right-10 space-top-15 align-top">
        <div class="card-header padding-4">
            <h3>
                Tarefas - <span class="project-color">Lista de Pendências</span>

                <i class="fa fa-area-chart right"></i>
            </h3>
        </div>

        <div class="card-body text-center padding-10">
            <div class="width-30 inline-block padding-4 space-left-6 space-right-6 align-top">
                <input class="knob" id="finished-activities" data-width="90" value="55" disabled>

                <h4 style="margin-top:8px !important;" class="underline">Tarefas Finalizadas</h4>

                <span class="block space-top-6">Porcentual de tarefas que estão com status <b>revisão</b> e/ou <b>finalizado</b>.</span>
            </div>

            <div class="width-30 inline-block padding-4 space-left-6 space-right-6 align-top">
                <input class="knob" id="pending-activities" data-width="90" value="25" disabled>

                <h4 style="margin-top:8px !important;" class="underline">Tarefas Pendentes</h4>

                <span class="block space-top-6">Porcentual de tarefas que estão com status <b>pendente</b> e/ou <b>não iniciado</b>.</span>
            </div>

            <div class="width-30 inline-block padding-4 space-left-6 space-right-6 align-top">
                <input class="knob" id="paused-activities" data-width="90" value="20" disabled>

                <h4 style="margin-top:8px !important;" class="underline">Tarefas Pausadas</h4>

                <span class="block space-top-6">Porcentual de tarefas que estão com status <b>pausado</b>.</span>
            </div>
        </div>

        <div class="card-footer text-right">
            <button class="confirm-button space-top-6 space-bottom-2">
                Verificar Tarefas <i class="fa fa-book white"></i>
            </button>
        </div>
    </div>

    <div class="card width-38 inline-block padding-12 space-top-15 align-top">
        <div class="card-header padding-4">
            <h3>
                Participação no Projeto

                <i class="fa fa-area-chart right"></i>
            </h3>
        </div>

        <div class="card-body padding-10">
            <div class="inline-block padding-6 text-left width-38">
                <input class="knob" id="activities-participation-chart" data-width="100" value="45" disabled>
            </div>

            <div class="inline-block align-top space-top-10 width-60 space-bottom-6">
                <h4 class="text-center underline">Atividades:</h4>

                <span class="block space-top-6">
                    Porcentual de participação deste usuário para com as atividades já disponibilizadas no projeto.
                </span>
            </div>

            <hr style="margin:0;">

            <div class="inline-block padding-6 text-left width-38 space-top-6">
                <input class="knob" id="commitments-participation-chart" data-width="100" value="10" disabled>
            </div>

            <div class="inline-block align-top space-top-10 width-60">
                <h4 class="text-center underline">Compromissos:</h4>

                <span class="block space-top-6">
                    Porcentual de participação deste usuário para com os compromissos já disponibilizados no projeto.
                </span>
            </div>
        </div>

        <div class="card-footer text-right">
            <button class="confirm-button space-top-6 space-bottom-2">
                Verificar Participações <i class="fa fa-book white"></i>
            </button>
        </div>
    </div>

    <div class="modal fade actual-modal"></div>
@endsection

@section('scripts')
    @include('usuario::projects.javascript.show-participant')
    <script src="{{ asset('js/knob/jquery.knob.min.js') }}"></script>
@endsection