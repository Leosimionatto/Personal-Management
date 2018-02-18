<script>
    $(document).ready(function(){
        window.Echo.channel('user.' + '{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->id }}')
            .listen('ChatMessageEvent', (e) => {
                alert(e);
            });

        conversations(function(response){
            if(response.html){
                $('.application-chat-body').html(response.html);
            }
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
                    });
                }

                if(response.status === '01'){
                    field.addClass('warning');
                    field.val('Usuário Inexistente');
                }
            });
        }
    });

    // Method to get an List of Messages
    function getMessages()
    {
        // Do nothing
    }

    // Method to get New Conversation Modal
    function newConversation(email, callback)
    {
        var request = $.ajax({
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
        var request = $.ajax({
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
        var request = $.ajax({
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
</script>