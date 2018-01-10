<script>
    $(document).ready(function(){
        $('#finished-activities').knob({
            width:'75px',
            height:'75px',
            readOnly: true,
            fgColor: '#628D6E'
        });

        $('#pending-activities').knob({
            width:'75px',
            height:'75px',
            readOnly: true,
            fgColor: '#F8D584'
        });

        $('#paused-activities').knob({
            width:'75px',
            height:'75px',
            readOnly: true,
            fgColor: '#C44D58'
        });

        $('#activities-participation-chart').knob({
            height:'95px',
            readOnly: true,
            fgColor: '#428bca'
        });

        $('#commitments-participation-chart').knob({
            height:'95px',
            readOnly: true,
            fgColor: '#FDB652'
        });
    });
</script>