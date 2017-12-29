@extends('usuario::layouts.login')

@section('content')
    <div class="center-page">
        <div class="card" style="width:850px">
            <div class="padding-10 width-30 align-top inline-block" style="background:#428bca;height:355px">
                <div class="block padding-10 text-center">
                    <div class="space-bottom-10 circular-icon">
                        <img src="{{ asset('img/seo-marketing/png/045-key.png') }}" width="65%">
                    </div>
                    <h4 class="white">{{ $participant->project->nmprojeto }}</h4>
                </div>
            </div>
            <div class="padding-12 width-70 inline-block align-top relative" style="margin-left:-3.5px;height:355px">
                <div class="card-header padding-4">
                    <i class="fa fa-key right" style="color:#428bca;font-size:18px"></i>
                    <h3>Personal <span style="color:#428bca;font-size:20px">Management</span> - Termos de Aceitação</h3>
                </div>
                <div class="card-body space-top-6">
                    <div class="block">
                        Ao concordar com a participação no projeto em questão, você estará concordando com os seguintes permissionamentos:
                        <ol class="space-top-6">
                            <li>
                                O <b>Projeto</b> ficará disponível em sua área de Gerenciamento Pessoal.
                            </li>
                            <li>
                                <b>Eventos</b> relacionados ao projeto em questão poderão ser acoplados ao seu calendário tendo como base às necessidades impostas pelos participantes
                                do Projeto em questão.
                            </li>
                            <li>
                                Você receberá <b>Notificações</b> constantes referente ao andamento do projeto em questão, de forma a mantê-lo atualizado para
                                com as informações do mesmo.
                            </li>
                            <li>
                                Seu feed de notícias constará todas as <b>Atualizaões Recentes</b> do Projeto em questão, sem excessões.
                            </li>
                        </ol>
                    </div>
                    <div class="block">
                        <input type="checkbox" class="accept"> Aceito os <b>Termos</b> impostos anteriormente.
                    </div>
                    <div class="space-top-10" style="position:absolute;bottom:10px;right:10px">
                        <button class="btn btn-danger space-right-6">Recusar Solicitação <i class="fa fa-thumbs-down white"></i></button>
                        <button class="btn btn-primary call-confirm-modal">Aceitar Solicitação <i class="fa fa-thumbs-up white"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal actual-modal"></div>
@endsection

@section('scripts')
    @include('usuario::projects.request.javascript.participation')
@endsection