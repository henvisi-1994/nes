<script type="text/javascript">
    $('#checkbox-outline-messages').click(function () {
        $.get( "/mark-all-messages-as-read", function( data ) {
            $('#notification-messages-ul').html('');
            $("#notification-messages-num").html(0);
        })
    });

    $('#checkbox-outline-notifs').click(function () {
        $.get( "/mark-all-likes-as-read", function( data ) {
            $('#notifications-ul').html('');
            $("#notification-number").html(0);
        })
    });
    
</script>