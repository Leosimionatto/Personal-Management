<script>
    $(document).ready(function(){
        var steps = [];
        var url = $('.steps').attr('data-href');
        var list = $('.steps-list');
        var step_form = $('.step-information');
        var without_steps = list.find('.without-steps');

        $('.add-step').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var condition = true;

            step_form.find(':input.step-information-required').each(function(){
                if(!$(this).hasClass('summernote')){
                    var value = $(this).val();

                    $(this).removeClass('warning');
                    $(this).parent().find('.invalid-field').remove();

                    if(!value){
                        $(this).addClass('warning');
                        $(this).parent().append('<p class="invalid-field">Este campo é obrigatório.</p>');

                        condition = false;
                    }
                }else{
                    var value = $(this).summernote('isEmpty');

                    $(this).parent().find('.invalid-field').remove();
                    $(this).parent().find('.note-frame').removeClass('warning');

                    if(value){
                        $(this).parent().find('.note-frame').addClass('warning');
                        $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');

                        condition = false;
                    }
                }
            });

            if(condition){
                var name = step_form.find('#nome').val();
                var descricao = step_form.find('#descricao').val();
                var i = list.find('tr').not('.without-steps').length;

                var cell = '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + name + '</td>' +
                    '<td><a href="" class="edit-step"><i class="fa fa-edit"></i></a></td>' +
                    '<td><a href="" class="delete-step"><i class="fa fa-remove red-color"></i></a></td>' +
                    '</tr>';

                if(i === 0){
                    list.html(cell);

                    steps[i] = {nmetapa: name, descricao: descricao};

                    return false;
                }

                list.append(cell);

                steps[i - 1] = {nmetapa: name, descricao: descricao};

                console.log(steps);
            }
        });
    });

    $(document).on('click', '.edit-step', function(){
        console.log($(this));
    });

    $(document).on('click', '.edit-step', function(){
        console.log($(this));
    });
</script>