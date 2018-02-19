<script>
    $(document).ready(function(){
        window.Echo.channel('user.' + '{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->id }}')
            .listen('ChatMessageEvent', (e) => {
                getMessages(function(response){
                    let actual = $('.application-chat-send-message');

                    if(actual.attr('data-id')){
                        let id = actual.attr('data-id');

                        let body = $('.application-chat-conversation-page-messages');

                        $.each(response['message'], function(index, element){
                            if(id === index){
                                $.each(element['conteudo'], function(key, value){
                                    body.append('<div class="conversation-message recipient-message">' + value + '</div>');
                                });

                                body.scrollTop(body[0].scrollHeight);
                            }
                        });
                    }
                });
            });

        conversations(function(response){
            if(response.html){
                $('.application-chat-body').html(response.html);
            }
        });

        $('.back-conversations').on('click', function(event){
            event.preventDefault();

            conversations(function(response){
                if(response.html){
                    $('.application-chat-body').html(response.html);
                }
            });
        });
    });

    $(document).on('click', '.chat-conversation', function(event){
        event.preventDefault();
        event.stopPropagation();

        let id = $(this).attr('data-id');

        conversationRoom(id, function(response){
            $('.application-chat-body').html(response.html);

            let content = $('.application-chat-conversation-page-messages');

            content.scrollTop(content[0].scrollHeight);

            $('.back-conversations').show();
        });
    });

    $(document).on('click', '.new-conversation', function(event){
        event.preventDefault();
        event.stopPropagation();

        $('.hidden-field').find('input').slideToggle(200);
    });

    $(document).on('keypress', '.new-conversation-field', function(event){
        let code = event.keyCode || event.which;

        if(code === 13){
            let field = $(this);
            field.removeClass('warning');

            newConversation($(this).val(), function(response){
                if(response.status === '00'){
                    conversationRoom(response.user.id, function(response){
                        $('.application-chat-body').html(response.html);

                        let content = $('.application-chat-conversation-page-messages');

                        content.scrollTop(content[0].scrollHeight);

                        $('.back-conversations').show();
                    });
                }

                if(response.status === '01'){
                    field.addClass('warning');
                    field.val('Usuário Inexistente');
                }
            });
        }
    });

    $(document).on('keypress', '.message-content', function(event){
        let code = event.keyCode || event.which;

        if(code === 13){
            $('.application-chat-send-message').trigger('click');
        }
    });

    $(document).on('click', '.application-chat-send-message', function(event){
        event.preventDefault();
        event.stopPropagation();

        let id = $(this).attr('data-id');
        let content = $(this).closest('.application-chat-conversation-page-field').find('input').val();

        sendMessage({
            id: id, conteudo: content
        });
    });

    // Method to get an List of Messages
    function getMessages(callback)
    {
        let url = '{{ route('chat.message.new') }}';

        let request = $.ajax({
            url: url,
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                callback(response);
            })
            .fail(function(response){
                callback(response);
            });
    }

    // Method to get New Conversation Modal
    function newConversation(email, callback)
    {
        let request = $.ajax({
            url: '{{ url('usuario/checar-email-usuario') }}',
            method: 'GET',
            data: {email: email}
        });

        request
            .done(function(response){
                callback(response);
            })
            .fail(function(response){
                callback(response);
            });
    }

    // Method to get all Conversations
    function conversations(callback)
    {
        $('.back-conversations').hide();

        let request = $.ajax({
            url: '{{ route('ajax.chat.conversations') }}',
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                callback(response);
            })
            .fail(function(response){
                callback(response);
            });
    }

    function conversationRoom(id, callback)
    {
        let request = $.ajax({
            url: '{{ url('usuario/ajax/chat/conversa') }}' + '/' + id,
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                callback(response);
            })
            .fail(function(response){
                callback(response);
            });
    }

    // Method to send Messages
    function sendMessage(data)
    {
        let url = '{{ url('usuario/chat/mensagem/enviar') }}' + '/' + data.id;

        let request = $.ajax({
            url: url,
            method: 'POST',
            data: data
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    let content = $('.application-chat-conversation-page-messages');

                    content.append('<div class="conversation-message issuer-message">' + response.message + '</div>');

                    $('.message-content').val('');

                    content.scrollTop(content[0].scrollHeight);
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }
</script>