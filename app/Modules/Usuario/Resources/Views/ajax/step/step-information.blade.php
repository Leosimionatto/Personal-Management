<div class="task-explanation space-bottom-10">
    <div class="rules padding-4 block">
        <b class="block medium">Informações Gerais da Tarefa:</b>
        <div class="table space-top-10 space-left-6" style="margin-bottom:8px !important;">
            <div class="table-row">
                <div class="table-cell width-40">
                    <b>Atribuídor: </b> {{ $step->task->assigner->nome }}
                </div>
                <div class="table-cell">
                    <b>Grupo: </b> {{ ($step->task->idgrupo != 1) ? 'Front-end' : 'Back-end' }}
                </div>
                <div class="table-cell">
                    <b>Situação: </b> {!! App\Utilities\Situation\Arrays::situationsLabel($step->idsituacao) !!}
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell" style="padding-top:8px;">
                    <b>Data entrega: </b> {{ (!empty($step->task->dtentrega)) ? (new \Carbon\Carbon($step->task->dtentrega))->format('d/m/Y') : 'Não definida' }}
                </div>
                <div class="table-cell" style="padding-top:8px;">
                    <b>Atribuída em: </b> {{ (!empty($step->criado_em)) ? (new \Carbon\Carbon($step->criado_em))->format('d/m/Y') : 'Indefinido' }}
                </div>
                <div class="table-cell" style="padding-top:8px;">
                    <b>Prioridade: </b> {!! App\Utilities\Priority\Arrays::priorityLabel($step->task->idprioridade) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="description padding-4 block">
        <b class="block medium space-bottom-4">Descrição:</b>
        <span style="font-size:13px !important;">{!! $step->descricao !!}</span>
    </div>

    <div class="block padding-4 space-bottom-6">
        <b class="block medium space-bottom-6">Arquivos anexados:</b>

        <span class="block space-bottom-6 space-left-4">
            <i class="fa fa-file space-right-6"></i>Nenhum arquivo anexado
        </span>
    </div>
</div>

<div class="space-top-15 padding-4">
    <span class="bold roboto big">
        Histórico de atualizações - <span class="roboto big bold-500">Tarefa Desenvolvilmento</span>:
    </span>
</div>

<hr style="margin:0 0 8px 0;">

<div class="steps text-center" style="padding-top:6px;">
    @if(count($step->history) > 0)
        @foreach($step->history as $history)
            <div class="update block">
                <div class="inline-block width-10 text-left padding-12 align-top">
                    <img src="{{ asset('img/notes-tasks/png/009-notes-7.png') }}" width="60px">
                </div>
                <div class="inline-block width-85 text-left space-left-6 align-center">
                    <div class="update-content padding-4">
                        <span class="block medium bold roboto" style="padding:0 0 4px 0;border-bottom:1px solid #f0f0f0;margin-bottom:6px;">
                            {{ $history->participant->user->nome }} <i class="fa fa-arrow-right space-left-4 space-right-4"></i> {{ App\Utilities\Time\Arrays::getTodayDateDiff($history->criado_em) }}

                            <i class="fa fa-archive space-top-2 right"></i>
                        </span>

                        <div class="space-top-6">
                            {!! $history->descricao !!}
                        </div>

                        @if(!empty($history->idvisualizador))
                            <div class="right">
                                <b>Visualizador:</b> {{ $history->viewer->user->nome }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning" style="display:block;">
            Nenhum <b>histórico de atualizações</b> encontrado na base de dados.
        </div>
    @endif
</div>