<div class="modal-dialog">
    <div class="modal-content" style="width:48%;height:327px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 background-dark-green padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/notes-tasks/png/022-whiteboard.png') }}" width="60px">
                </div>

                <h4 class="white">Alteração de Status</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;height:325px;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <b class="big">{{ $step->nmetapa }} <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> <u class="big bold roboto">Andamento</u></b>

                    <i class="fa fa-thermometer-three-quarters dark-green-color right big space-top-2"></i>
                </div>
                <div class="block space-top-2 padding-6">
                    <div class="block padding-4">
                        <p class="block" style="margin:0;">Ao <b>confirmar</b> essa operação esteja ciente das seguintes ações:</p>

                        <ol style="padding:4px 0 0 15px;">
                            <li>
                                A <b>situação</b> da tarefa/etapa é uma informação utilizada para a realização de cálculos estatísticos.
                            </li>
                            <li>
                                O usuário atribuidor da tarefa receberá <b>notificações</b> constantes referente ao andamento das tarefas, ou seja, esteja certo de que a situação selecionada é
                                realmente a correta de maneira a não gerar inconvenientes e/ou contratempos.
                            </li>
                            <li>
                                Históricos de Atualizações referente a alteração de situações não podem ser <b>modificados</b> e/ou <b>excluídos</b>.
                            </li>
                        </ol>
                    </div>
                    <div class="text-right" style="position:absolute;bottom:12px;right:10px">
                        <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                        <button class="success-button confirm-cancel not-required" data-id="{{ $step->id }}">Confirmar <i class="fa fa-check white"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>