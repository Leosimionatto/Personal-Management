<div class="application-chat-conversation-page">
    <div class="application-chat-conversation-page-messages overflow-auto without-scroll">
        @if(count($messages) > 0)
            @foreach($messages as $message)
                @if($message->idemitente === $userid)
                    <div class="conversation-message issuer-message">
                        {{ $message->conteudo }}
                    </div>
                @else
                    <div class="conversation-message recipient-message">
                        {{ $message->conteudo }}
                    </div>
                @endif
            @endforeach
        @else
            <div class="alert alert-warning without-messages" style="display:block">
                Nenhuma mensagem encontrada.
            </div>
        @endif
    </div>

    <div class="application-chat-conversation-page-field">
        <input name="conteudo" type="text" class="form-control message-content" placeholder="Escreva sua mensagem...">
        <button class="btn btn-warning big-circular-button application-chat-send-message space-left-6" data-id="{{ $id }}" data-toggle="tooltip" data-placement="left" title="Enviar a Mensagem"><i class="fa fa-commenting medium white"></i></button>
    </div>
</div>

<script>
    $('.send-message').tooltip({
        container: 'body'
    });
</script>