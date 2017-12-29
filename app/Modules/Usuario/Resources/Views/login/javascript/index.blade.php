<script>
    $(document).ready(function(){
        $('.login-form').on('submit', function(event){
            var condition = true;

            $(this).find(':input').each(function(){
                var value = $(this).val();

                $(this).parent().find('.invalid-field').remove();

                if(!value){
                    $(this).addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório.</p>');

                    condition = false;
                }
            });

            if(!condition){
                event.preventDefault();
                event.stopPropagation();

                return false;
            }
        });

        $('input').keypress(function(e){
            if(e.which == 13){
                $('.login-form').submit();
                return false;
            }
        });

        $('.submit').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            $('.login-form').submit();
        });
    });
</script>