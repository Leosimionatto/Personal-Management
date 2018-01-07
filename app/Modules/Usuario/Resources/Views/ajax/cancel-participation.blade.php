<div class="modal-dialog">
    <div class="modal-content" style="width:48%;height:327px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#F8D584">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/users/png/lock-3.png') }}" width="60px">
                </div>

                <h4 class="white">Cancelar Participação</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;height:325px;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <b class="big">Participante <i class="fa fa-arrow-right yellow-color space-right-4 space-left-4"></i> {{ $participant->user->nome }}</b>

                    <i class="fa fa-battery-1 yellow-color right big space-top-2"></i>
                </div>
                <div class="block space-top-2 padding-6">
                    Ao realizar essa operação, implicitamente você também realizará as seguintes ações:

                    <ol class="space-top-6">
                        <li>O usuário perderá a visibilidade do projeto</li>
                        <li>Todas as informações do projeto cujo possuem relações com esse usuário serão removidas</li>
                        <li>Todas as formas de acesso ao projeto por parte desse usuário serão impossibilitadas, incluindo o <b>Token de Acesso</b></li>
                    </ol>

                    <div class="text-right" style="position:absolute;bottom:12px;right:10px">
                        <button class="warning-button space-right-4 not-required" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                        <button class="success-button confirm-cancel not-required" data-id="{{ $participant->id }}">Confirmar <i class="fa fa-check white"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>