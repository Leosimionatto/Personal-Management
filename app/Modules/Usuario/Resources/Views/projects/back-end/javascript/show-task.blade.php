<script>
    $(document).ready(function(){
        var actual = '{{ $task->steps()->first()->id }}';

        $('.task-step').on('click', function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            $('.step-name').html(name);

            step(id);
        });

        step(actual);
    });

    function step(id){

    }
</script>