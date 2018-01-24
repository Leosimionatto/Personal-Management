<div class="modal-dialog">
    <div class="modal-content" style="width:45%;max-height:367px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#628D6E">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/users/png/user-2.png') }}" width="60px">
                </div>

                <h4 class="white">Adicionar Participante</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <b class="big">Participante <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> Buscando informações</b>

                    <i class="fa fa-book dark-green-color right big space-top-2"></i>
                </div>

                <div class="padding-12" style="padding-top:4px">
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="email" class="form-label">E-mail do Usuário</label>
                        <input type="email" name="email" class="form-control participant-email space-bottom-4" id="email" placeholder="exemplo@exemplo.com.br">
                    </div>
                </div>

                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <b class="big">Informações Participante</b>

                    <i class="fa fa-address-book dark-green-color right big space-top-2"></i>
                </div>

                <div class="padding-12">
                    <div class="inline-block width-20 align-center text-center padding-4">
                        <img src="{{ asset('img/users/png/user-7.png') }}" width="85%" alt="">
                    </div>
                    <div class="inline-block space-left-4 align-top">
                        <span class="block"><b class="medium">Nome:</b> <span class="nmusuario">Exemplo</span></span>
                        <span class="block space-top-2"><b class="medium">E-mail:</b> <span class="email">exemplo@exemplo.com.br</span></span>
                        <span class="block space-top-2"><b class="medium">Documento:</b> <span class="documento">000.000.000-00</span></span>
                    </div>
                </div>

                <div class="form-group padding-10 text-right add-participant-actions" style="padding-bottom:16px;">
                    <button class="confirm-button not-required check-user">Verificar existência <i class="fa fa-globe white"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>