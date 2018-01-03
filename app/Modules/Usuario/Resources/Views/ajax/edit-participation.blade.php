<div class="modal-dialog">
    <div class="modal-content" style="width:45%;max-height:367px;position:relative !important;">
        <div class="modal-body" style="padding:0">
            <div class="width-38 padding-12 text-center inline-block align-top" style="position:absolute;left:0;bottom:0;top:0;background-color:#628D6E">
                <div class="circular-icon space-top-6 space-bottom-10">
                    <img src="{{ asset('img/seo-marketing/png/031-edit.png') }}" width="60px">
                </div>

                <h4 class="white">Cargo e Deveres</h4>
            </div>
            <div class="inline-block width-60" style="margin-left:39%;">
                <div style="border-bottom:1px solid #e0e0e0;padding:8px 12px 5px 8px;">
                    <b class="big">Participante <i class="fa fa-arrow-right dark-green-color space-right-4 space-left-4"></i> {{ $participant->user->nome }}</b>

                    <i class="fa fa-book dark-green-color right big space-top-2"></i>
                </div>
                <form action="" class="padding-12 space-top-2 edit-participation-form">
                    <div class="form-group">
                        <label for="cargo" class="form-label" style="margin-top:-4px !important;">Cargo do Participante</label>
                        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Cargo Exemplo">
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="deveresdesc" class="form-label">Descrição dos Deveres</label>
                        <textarea name="deveresdesc" class="form-control form-text-area" id="deveresdesc" placeholder="Descrição de Exemplo..."></textarea>
                    </div>

                    <input type="hidden" name="id" value="{{ $participant->id }}">

                    <div class="form-group space-top-10 text-right">
                        <button class="warning-button space-right-4" data-dismiss="modal">Cancelar <i class="fa fa-remove white"></i></button>
                        <button class="success-button confirm">Confirmar <i class="fa fa-check white"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>