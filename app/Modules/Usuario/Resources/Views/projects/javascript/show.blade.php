<script>
    $(document).ready(function(){
        $('#finished-activities').knob({
            width:'42%',
            readOnly: true,
            fgColor: '#628D6E',
            format: function(value){
                return value + '%';
            }
        });

        $('#pending-activities').knob({
            width:'42%',
            readOnly: true,
            fgColor: '#F8D584',
            format: function(value){
                return value + '%';
            }
        });

        $('#paused-activities').knob({
            width:'42%',
            readOnly: true,
            fgColor: '#C44D58',
            format: function(value){
                return value + '%';
            }
        });

        $('#front-end-status').knob({
            width:'42%',
            readOnly: true,
            fgColor: '#5E6396',
            format: function(value){
                return value + '%';
            }
        });
    });
</script>