<div class="modal-dialog">
    <div class="modal-content" style="width:700px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 background-dark-green padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#628D6E">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/notes-tasks/png/002-notes-12.png') }}" width="60px">
                </div>

                <h4 class="white">Tempo Gasto na Atividade</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <i class="fa fa-thermometer-three-quarters dark-green-color right big space-top-2"></i>

                    <div class="dots" style="width:90%;" title="{{ $step->nmetapa }}">
                        <b class="big">Adicionar Tempo <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> {{ $step->nmetapa }}</b>
                    </div>
                </div>
                <div class="block space-top-2 padding-6">
                    <form class="change-task-situation">
                        <div class="alert alert-danger error" style="display:none;margin-bottom:4px;"></div>

                        <div class="block padding-4">
                            <div class="block">
                                É através das informações fornecidas aqui que é possível estipular um valor total para o projeto em questão. O Gerenciamento do Tempo de Trabalho é uma das
                                etapas mais importantes no decorrer do projeto, por isso, mantenha essas informações sempre atualizadas.
                            </div>

                            <div class="form-group" style="margin-top:-6px;padding:6px 0 50px 0;">
                                <label for="tempogasto" class="form-label">Tempo Gasto na Etapa</label>
                                <input type="text" name="tempogasto" class="form-control time" id="tempogasto" placeholder="Tempo Gasto na Atividade">
                            </div>

                            <input type="hidden" name="idetapa" value="{{ $step->id }}">
                        </div>
                        <div class="text-right" style="position:absolute;bottom:12px;right:10px">
                            <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                            <button class="success-button not-required">Confirmar <i class="fa fa-check white"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>