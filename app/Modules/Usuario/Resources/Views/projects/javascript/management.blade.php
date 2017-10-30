<script>
    $(document).ready(function(){
        $('#tecnologias').multipleSelect({
            'placeholder':'Tecnologias a serem utilizadas',
            'width':'100%'
        });

        $('.ms-parent').focusin(function(){
            $(this).removeClass('warning');
            $(this).parent().find('.invalid-field').remove();
        });
    });
</script>