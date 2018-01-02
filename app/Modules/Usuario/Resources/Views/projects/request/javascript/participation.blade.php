<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.call-recuse-modal').on('click', function(event){
            event.preventDefault();

            call_recuse_modal();
        });

        $('.call-confirm-modal').on('click', function(event){
            event.preventDefault();

            var div = $('.accept');
            var condition = $('.accept:checked').length > 0;

            div.parent().find('.invalid-field').remove();

            if(condition){
                call_confirm_modal();
            }else{
                div.parent().append('<p class="invalid-field">Você precisa concordar com os termos.</p>');
            }
        });
    });

    // Method to call and get Confirm Modal
    function call_confirm_modal()
    {
        var request = $.ajax({
            url: '{{ route('modal.confirm') }}',
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                if(response.html){
                    var modal = $('.actual-modal');

                    modal.html(response.html);
                    modal.modal('show');
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to call and get Confirm Modal
    function call_recuse_modal()
    {
        var request = $.ajax({
            url: '{{ route('modal.recuse') }}',
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                if(response.html){
                    var modal = $('.actual-modal');

                    modal.html(response.html);
                    modal.modal('show');
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    $(document).on('click', '.confirm', function(){
        var url = '{{ url("usuario/projeto/solicitacao/participacao") }}';

        var request = $.ajax({
            url: url,
            method: 'POST',
            data: {
                token: '{{ $token }}',
                solicitapart: 'ace',
                fltoken: 's'
            }
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.href = '{{ url('usuario/projeto/') }}' + '/' + response.id;
                }
            })
            .fail(function(response){
               // Do nothing
            });
    });

    $(document).on('click', '.recuse', function(){
        var url = '{{ url("usuario/projeto/solicitacao/participacao") }}';

        var request = $.ajax({
            url: url,
            method: 'POST',
            data: {
                token: '{{ $token }}',
                solicitapart: 'rec',
                fltoken: 's'
            }
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.href = '{{ url('usuario/projeto') }}';
                }
            })
            .fail(function(response){
                // Do nothing
            });
    });
</script>