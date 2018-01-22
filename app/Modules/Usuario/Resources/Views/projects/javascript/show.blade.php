<script>
    $(document).ready(function(){
        $('#finished-activities').knob({
            width:'45px',
            readOnly: true,
            fgColor: '#628D6E',
            format: function(value){
                return value + '%';
            }
        });

        $('#pending-activities').knob({
            width:'45px',
            readOnly: true,
            fgColor: '#F8D584',
            format: function(value){
                return value + '%';
            }
        });

        $('#paused-activities').knob({
            width:'45px',
            readOnly: true,
            fgColor: '#C44D58',
            format: function(value){
                return value + '%';
            }
        });

        $('#front-end-status').knob({
            width:'45px',
            readOnly: true,
            fgColor: '#5E6396',
            format: function(value){
                return value + '%';
            }
        });

        $('#front-end-participants').knob({
            width:'46px',
            readOnly: true,
            fgColor: '#5E6396',
            format: function(value){
                return value + '%';
            }
        });

        $('#back-end-participants').knob({
            width:'46px',
            readOnly: true,
            fgColor: '#84AED3',
            format: function(value){
                return value + '%';
            }
        });

        $('#user-participation').knob({
            width:'46px',
            readOnly: true,
            fgColor: '#428bca',
            format: function(value){
                return value + '%';
            }
        });

        $('#user-tasks').knob({
            width:'46px',
            readOnly: true,
            fgColor: '#428bca',
            format: function(value){
                return value + '%';
            }
        });

        c3.generate({
            bindto: '#front-and-back-end-comparison',
            data: {
                x: 'x',
                type: 'area',
                columns: [
                    ['x', '1 Sem', '2 Sem', '3 Sem', '4 Sem'],
                    ['Back-end', 3, 1, 4, 2],
                    ['Front-end', 2, 2, 2, 3]
                ],
                colors: {
                    'Back-end': '#628D6E',
                    'Front-end': '#428bca'
                }
            },
            axis: {
                y: {
                    show: false
                },
                x: {
                    type: 'category'
                }
            },
            tooltip: {
                format: {
                    title: function(){
                        return 'Tarefas';
                    }
                }
            }
        });
    });
</script>