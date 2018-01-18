<script>
    $(document).ready(function(){
        var steps = [];
        var url = $('.steps').attr('data-href');

        $('.submit-form').on('click', function(event){
            event.preventDefault();
            event.stopPropagation();

            var list = $('.steps-list');
            var condition = true;
            var form = $('.steps');

            form.find(':input.required').each(function(){
                var value = $(this).val();

                $(this).removeClass('warning');
                $(this).parent().find('.invalid-field').remove();

                if(!value || value === '' || value === '-1'){
                    $(this).addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');

                    condition = false;
                }
            });

            form.find('.required-summernote').each(function(){
                var value = $(this).summernote('isEmpty');

                $(this).parent().find('.invalid-field').remove();
                $(this).parent().find('.note-frame').removeClass('warning');

                if(value){
                    $(this).parent().find('.note-frame').addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');

                    condition = false;
                }
            });

            if(condition){
                steps = [];

                list.find('.step-information').each(function(){
                    var name = $(this).find('#nome').val();
                    var description = $(this).find('#descricao').val();

                    steps.push({nmetapa: name, descricao: description});
                });

                var post = $('.task-information :input').serializeArray();

                post.push({name: 'etapas', value: JSON.stringify(steps)});
                post.push({name: 'idprojeto', value: '{{ $project->id }}'});

                ajax_request(url, post, function(response){
                    if(response.status === '00'){
                        window.location.reload();
                    }
                }, true);
            }
        });
    });

    // Method to delete an step
    $(document).on('click', '.remove-step', function(event){
        event.preventDefault();

        var count = $('.steps-list').find('.step-information').length;

        if(count > 1){
            $(this).closest('.step-information').remove();
        }

        return false;
    });

    var form = $('.step-information');

    $(document).on('click', '.add-step', function(event){
        event.preventDefault();
        event.stopPropagation();

        var clone = form.clone();
        var parent = $(this).closest('.step-information');

        clone.find(':input').val('');

        clone.find('.summernote-container').empty();

        clone.find('.summernote-container').append('<textarea name="descricao" class="form-control summernote form-text-area required-summernote" id="descricao" placeholder="Qual a descriçao da etapa?"></textarea>');
        clone.find('.summernote').summernote({
            height: 180,
            focus: true,
            resize: false,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']]
            ],
            disableResizeEditor: true
        });

        clone.insertAfter(parent);
    });
</script>