<div class="task-explanation space-bottom-10">
    <div class="description space-top-2 space-bottom-6 block">
        <b class="block medium">Descrição:</b>
        <span style="font-size:13px !important;">{{ $step->descricao }}</span>
    </div>
    <div class="rules space-bottom-6 block">
        <b class="block medium">Regras de negócio:</b>
        <ul>
            <li>Qualquer usuário pode enviar imagens</li>
            <li>Os campos obrigatórios são: Nome, CPF, Data de nascimento, etc...</li>
            <li>Um usuário pode ter enviar diversas imagens</li>
        </ul>
    </div>
    <div class="block space-bottom-15">
        <b class="block medium">Arquivos anexados:</b>
        <span class="block space-top-6 space-bottom-6 space-left-4">
            <i class="fa fa-file space-right-6"></i><a href="">Erro(Módulo de Usuários).png</a>
        </span>
        <span class="block space-top-6 space-bottom-6 space-left-4">
            <i class="fa fa-file space-right-6"></i><a href="">Error-404-administradores.png</a>
        </span>
    </div>
</div>

<div class="space-top-15 padding-4">
    <span class="bold roboto big">
        Histórico de atualizações - <span class="roboto big bold-500">Tarefa Desenvolvilmento</span>:
    </span>
</div>

<hr style="margin:0 0 8px 0;">

<div class="steps">
    @foreach($task->history as $history)
        <div class="update block">
            <div class="inline-block width-10 padding-12 align-top">
                <img src="{{ asset('img/notes-tasks/png/009-notes-7.png') }}" width="70px">
            </div>
            <div class="inline-block width-85 space-left-15 align-center">
                <div class="update-content padding-4">
                    <span class="block medium bold roboto" style="padding:0 0 4px 0;border-bottom:1px solid #f0f0f0;margin-bottom:6px;">
                        {{ $history->participant->user->nome }} - {{ (new \Carbon\Carbon($history->criado_em))->format('d/m/Y H:i:s') }}

                        <i class="fa fa-exclamation-triangle space-top-2 right"></i>
                    </span>

                    {{ $history->descricao }}
                </div>
            </div>
        </div>
    @endforeach
</div>