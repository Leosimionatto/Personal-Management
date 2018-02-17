<script>
    $(document).ready(function(){
        window.Echo.channel('user.' + '{{ \Illuminate\Support\Facades\Auth::guard('user')->user()->id }}')
            .listen('ChatMessageEvent', (e) => {
                alert(e);
            });

        $('.new-conversation').on('click', function(event){
            event.preventDefault();
            event.stopPropagation();

            $('.hidden-field').find('input').slideToggle(200);
        });

        $('.new-conversation-field').on('keypress', function(event){
            let code = event.keyCode || event.which;

            if(code === 13){
                let field = $(this);
                field.removeClass('warning');

                newConversation($(this).val(), function(response){
                    if(response.status === '00'){
                        console.log('Bem sucedido!');
                    }

                    if(response.status === '01'){
                        field.addClass('warning');
                        field.val('Usuário Inexistente');
                    }
                });
            }
        });
    });

    function getMessages()
    {

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
</script>