<div class="application-chat">
    <div class="application-chat-menu">
        Personal <span style="color:#86C543;font-size:17px">Management</span> - Conversas

        <i class="fa fa-comments right" style="font-size:19px;margin-top:2px;"></i>
    </div>
    <div class="application-chat-body overflow-auto without-scroll">
        <div class="chat-conversation" data-id="2">
            <div class="width-15 space-left-4 inline-block">
                <img src="{{ asset('img/sem-foto.png') }}" width="100%">
            </div>
            <div class="width-80 align-center inline-block space-left-10">
                <label class="label label-danger right">6</label>

                <div class="block">
                    <span class="block"><b class="roboto">Nome:</b> Gilberto Giro Resende</span>
                    <span class="block roboto small space-top-4"><b class="roboto small">Último login:</b> {{ date('d/m/Y') }}</span>
                </div>
            </div>
        </div>

        <div class="application-chat-actions">
            <div class="hidden-field inline-block space-right-4">
                <input type="text" class="form-control new-conversation-field" placeholder="E-mail do Usuário" style="display:none !important;">
            </div>

            <button class="btn btn-warning big-circular-button new-conversation" data-toggle="tooltip" data-placement="left" title="Nova Conversa">
                <i class="fa fa-user-plus medium white"></i>
            </button>
        </div>
    </div>
    <div class="application-chat-footer">
        © Copyright <span class="green-color" style="margin:0 3px 0 3px">Personal Management</span> Reserved
    </div>
</div>

@include('usuario::layouts.javascript.chat')