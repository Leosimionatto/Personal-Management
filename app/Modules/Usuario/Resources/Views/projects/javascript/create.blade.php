<script>
    $(document).ready(function(){
        var steps = $('.steps');
        var url = steps.attr('data-href');

        $('.submit-form').click(function(){
            steps.find('.required').each(function(){
                var value = $(this).val();

                $(this).parent().find('.invalid-field').remove();

                if(value === '' || value === null){
                    $(this).removeClass('warning').addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                }
            });

            if(steps.find('.warning').length === 0){
                var form = [];

                $('.steps').find('form').each(function(index){
                    form[index] = $(this).find(':input').not('#tecnologias').serializeArray();
                });

                var values = $('#tecnologias').multipleSelect('getSelects', 'array');
                var select = [];

                $.each(values, function(index, value){
                    select[index] = {name:'tecnologias', value:value};
                });

                form[0].push(select);

                ajax_request(url, form);
            }
        });

        $('#tecnologias').multipleSelect({
            'placeholder':'Tecnologias a serem utilizadas',
            'width':'100%'
        });



        $('.ms-parent').focusin(function(){
            $(this).find('.ms-choice').removeClass('warning');
            $(this).parent().find('.invalid-field').remove();
        });
    });
</script>
