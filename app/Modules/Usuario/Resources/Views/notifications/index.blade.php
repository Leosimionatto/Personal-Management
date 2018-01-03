@extends('usuario::layouts.app')

@section('content')
    <div class="menu-top card padding-12 space-bottom-15 relative">
        <div class="block">
            <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
            <span class="disabled-route-option">Notificações</span>
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
                Notificações - <span class="project-color">Lista de Informações Gerais</span>
                <i class="fa fa-envelope right"></i>
            </h3>
            <p style="margin:2px 0 0 0;">Todas as atualizações referente a qualquer um dos seus <b>Módulos de Gerenciamento</b> irão aparecer aqui.</p>
        </div>

        <div class="card-body padding-10 space-bottom-6 space-top-6">
            <table class="relative" style="margin:0">
                <thead style="background-color:#587658">
                    <tr>
                        <th class="white bold-500 padding-10"><i class="fa fa-user white"></i> Emitente</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-database white"></i> Módulo</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-bell white"></i> Notificação</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-calendar-check-o white"></i> Recebida em</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-info-circle white"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($notifications) > 0)
                        @foreach($notifications as $notification)
                            <tr>
                                <td>{{ (!empty($notification['data']['issuer'])) ? $notification['data']['issuer'] : '-' }}</td>
                                <td>{{ (!empty($notification['data']['module'])) ? $notification['data']['module'] : '-' }}</td>
                                <td>{!! $notification['data']['message'] !!}</td>
                                <td>{{ (new \Carbon\Carbon($notification['created_at']))->format('d/m/Y') }}</td>
                                <td>
                                    @if(empty($notification['read_at']))
                                        <button class="btn btn-success circular-button read" data-id="{{ $notification['id'] }}" data-toggle="tooltip" data-placement="top" title="Marcar como Lido"><i class="fa fa-book white"></i></button>
                                    @endif

                                    <button class="btn btn-danger circular-button delete" data-id="{{ $notification['id'] }}" data-toggle="tooltip" data-placement="top" title="Remover Notificação"><i class="fa fa-trash white"></i></button>

                                    @if(!empty($notification['data']['route']))
                                        <button class="btn btn-primary circular-button" data-toggle="tooltip" data-placement="top" title="Ir ao Local"><i class="fa fa-external-link white"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="padding:16px">Nenhuma notificação pendente.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('usuario::notifications.javascript.index')
@endsection
