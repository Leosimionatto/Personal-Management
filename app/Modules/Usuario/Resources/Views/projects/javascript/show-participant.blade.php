<script>
    $(document).ready(function(){
        $('#finished-activities').knob({
            width:'60px',
            height:'60px',
            readOnly: true,
            fgColor: '#628D6E',
            format: function(value){
                return value + '%';
            }
        });

        $('#pending-activities').knob({
            width:'60px',
            height:'60px',
            readOnly: true,
            fgColor: '#F8D584',
            format: function(value){
                return value + '%';
            }
        });

        $('#paused-activities').knob({
            width:'65px',
            height:'65px',
            readOnly: true,
            fgColor: '#C44D58',
            format: function(value){
                return value + '%';
            }
        });

        $('#activities-participation-chart').knob({
            height:'90px',
            readOnly: true,
            fgColor: '#428bca',
            format: function(value){
                return value + '%';
            }
        });

        $('#commitments-participation-chart').knob({
            height:'90px',
            readOnly: true,
            fgColor: '#FDB652',
            format: function(value){
                return value + '%';
            }
        });
    });
</script>