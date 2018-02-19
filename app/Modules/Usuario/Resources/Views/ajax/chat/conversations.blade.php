@if(count($conversations) > 0)
    @foreach($conversations as $conversation)
        <div class="chat-conversation" data-id="{{ ($conversation->issuer->id != $authenticated->id) ? $conversation->issuer->id : $conversation->recipient->id }}">
            <div class="width-15 space-left-4 inline-block">
                <img src="{{ asset('img/sem-foto.png') }}" width="100%">
            </div>
            <div class="width-80 align-center inline-block space-left-10">
                <label class="label label-danger right">{{ count($conversation) }}</label>

                <div class="block">
                    <span class="block"><b class="roboto">Nome:</b> {{ ($conversation->issuer->nome != $authenticated->nome) ? $conversation->issuer->nome : $conversation->recipient->nome }}</span>
                    <span class="block roboto small space-top-4"><b class="roboto small">Último login:</b> {{ date('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="alert alert-warning" style="display:block">
        Nenhuma conversa encontrada
    </div>
@endif

<div class="application-chat-actions">
    <div class="hidden-field inline-block space-right-4">
        <input type="email" class="form-control new-conversation-field" placeholder="E-mail do Usuário" style="display:none !important;">
    </div>

    <button class="btn btn-warning big-circular-button new-conversation" data-toggle="tooltip" data-placement="left" title="Nova Conversa">
        <i class="fa fa-user-plus medium white"></i>
    </button>
</div>

<script>
    $('.new-conversation').tooltip({
        container: 'body'
    });
</script>