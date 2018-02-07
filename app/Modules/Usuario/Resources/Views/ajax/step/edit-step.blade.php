<div class="modal-dialog">
    <div class="modal-content" style="width:700px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 background-dark-green padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#628D6E">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/notes-tasks/png/022-whiteboard.png') }}" width="60px">
                </div>

                <h4 class="white">Alteração de Status</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <i class="fa fa-thermometer-three-quarters dark-green-color right big space-top-2"></i>

                    <div class="dots" style="width:90%;" title="{{ $step->nmetapa }}">
                        <b class="big">{{ App\Utilities\Situation\Arrays::situations($situation) }} <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> {{ $step->nmetapa }}</b>
                    </div>
                </div>
                <div class="block space-top-2 padding-6">
                    <form class="change-task-situation">
                        <div class="alert alert-danger error" style="display:none;margin-bottom:4px;"></div>

                        <div class="block padding-4">
                            <p class="block" style="margin:0;">Ao <b>confirmar</b> essa operação esteja ciente das seguintes ações:</p>

                            <ol style="padding:4px 0 35px 15px;">
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

                            <input type="hidden" name="idetapa" value="{{ $step->id }}">
                            <input type="hidden" name="idsituacao" value="{{ $situation }}">
                        </div>
                        <div class="text-right" style="position:absolute;bottom:12px;right:10px">
                            <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                            <button class="success-button confirm-status-update not-required">Confirmar <i class="fa fa-check white"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>