@extends('usuario::layouts.app')

@section('content')
    <div class="menu-top card padding-12 space-bottom-15 relative">
        <div class="block">
            <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.show', $id) }}">Visualização Projeto <i class="fa fa-arrow-right"></i></a></span>
            <span class="disabled-route-option">Participantes</span>
            <span class="right sign-out"><a href="{{ route('logout') }}" class="disabled-route-option">Sair <i class="fa fa-sign-out"></i></a></span>

            @include('usuario::layouts.notification')

            <span class="right disabled-route-option space-right-15">Personal Management</span>
        </div>
    </div>

    <div class="actions space-bottom-15">
        <button class="btn btn-warning mark-all-as-read">Marcar todas como lidas <i class="fa fa-book white"></i></button>
        <button class="btn btn-primary right delete-all">Limpar Caixa de Notificações <i class="fa fa-trash white"></i></button>
        <button class="btn btn-primary space-right-6 right">Exportar <i class="fa fa-file-excel-o white"></i></button>
    </div>

    <div class="card padding-10">
        <div class="card-header padding-4">
            <h3>
                Participantes - <span class="project-color">Lista de Informações Gerais</span>
            </h3>
            <p style="margin:2px 0 0 0;">Todas as atualizações referente a qualquer um dos seus <b>Módulos de Gerenciamento</b> irão aparecer aqui.</p>
        </div>

        <div class="card-body padding-10 space-bottom-6 space-top-6">
            <table class="relative" style="margin:0">
                <thead style="background-color:#587658">
                    <tr>
                        <th class="white bold-500 padding-10"><i class="fa fa-gears white"></i> Situação</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-user white"></i> Participante</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-briefcase white"></i> Cargo</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-info-circle white"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($participants) > 0)
                        @foreach($participants as $participant)
                            <tr>
                                <td>{!! (!empty($participant->cargo) && !empty($participant->deveresdesc)) ? '<i class="fa fa-check green-color big"></i>' : '<i class="fa fa-remove red-color big"></i>' !!}</td>
                                <td>{{ $participant->user->nome }}</td>
                                <td>{{ (!empty($participant->cargo)) ? $participant->cargo : '-' }}</td>
                                <td>
                                    <a href="{{ route('project.request', $id) }}" target="_blank" style="text-decoration:none">
                                        <button class="btn btn-info circular-button" data-toggle="tooltip" data-placement="top" title="Verificar Requisição"><i class="fa fa-send white"></i></button>
                                    </a>
                                    <a href="" class="cancel" data-id="{{ $participant->id }}" data-toggle="tooltip" data-placement="top" title="Cancelar Participação">
                                        <button class="btn btn-warning circular-button"><i class="fa fa-lock white"></i></button>
                                    </a>
                                </td>
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

    <div class="modal fade actual-modal"></div>
@endsection

@section('scripts')
    @include('usuario::projects.javascript.participant')
@endsection