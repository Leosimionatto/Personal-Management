@extends('usuario::layouts.app')

@section('content')
    <div class="menu-top card padding-12 space-bottom-15 relative">
        <div class="block">
            <span class="available-route-option"><a href="{{ route('index') }}">Página inicial <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.index') }}">Projetos <i class="fa fa-arrow-right"></i></a></span>
            <span class="available-route-option"><a href="{{ route('project.show', $id) }}">Visualização Projeto <i class="fa fa-arrow-right"></i></a></span>
            <span class="disabled-route-option">Requisições de Participação</span>
            <span class="right sign-out"><a href="{{ route('logout') }}" class="disabled-route-option">Sair <i class="fa fa-sign-out"></i></a></span>

            @include('usuario::layouts.notification')

            <span class="right disabled-route-option space-right-15">Personal Management</span>
        </div>
    </div>

    <div class="actions space-bottom-15">
        <a href="">
            <button class="btn btn-warning">Adicionar participante <i class="fa fa-user-plus white"></i></button>
        </a>
    </div>

    <div class="card padding-12">
        <div class="card-header padding-4">
            <h3>
                Requisições de Participação - <span class="project-color">Lista de Informações</span>
            </h3>
            <p style="margin:2px 0 0 0;">Lista de participantes que estão aguardando pelo posicionamento em algum dos setores de atuação no projeto em questão.</p>
        </div>
        <div class="card-body padding-12">
            <table style="margin:0">
                <thead>
                    <tr style="background-color:#587658">
                        <th class="white bold-500 padding-10"><i class="fa fa-user white"></i> Participante</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-briefcase white"></i> Cargo</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-graduation-cap white"></i> Deveres</th>
                        <th class="white bold-500 padding-10"><i class="fa fa-legal white"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($participants) > 0)
                        @foreach($participants as $participant)
                            <tr>
                                <td>{{ $participant->user->nome }}</td>
                                <td>{{ (!empty($participant->cargo)) ? $participant->cargo : '-' }}</td>
                                <td>{{ (!empty($participant->deveresdesc)) ? $participant->deveresdesc : '-' }}</td>
                                <td>
                                    <button class="btn btn-primary circular-button edit" data-toggle="tooltip" data-placement="top" title="Editar Informações" data-id="{{ $participant->user->id }}"><i class="fa fa-address-book white"></i></button>
                                    <button class="btn btn-warning circular-button" data-toggle="tooltip" data-placement="top" title="Cancelar Participação"><i class="fa fa-lock white"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade actual-modal"></div>
@endsection

@section('scripts')
    @include('usuario::projects.request.javascript.index')
@endsection