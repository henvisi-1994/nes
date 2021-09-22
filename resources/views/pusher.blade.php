{{-- TODO: remember to change BROADCAST_DRIVER=ably or BROADCAST_DRIVER=pusher in .env
    when changing from Ably/Pusher. Also, when using Pusher,
    remove the Ably section in config/bootstrap.js --}}

@if (env('USE_ABLY') == 'true')
<script src="https://cdn.ably.com/lib/ably.min-1.js"></script>
@else
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@endif

<script>
    var url = '/notification.mp3';  // notification sound

    @if ($onMessageReceivedAlert == true)
    // /messages, /messages/{id}
    // show the alert when a new notification arrives
    function emptyAlert() {
        $('.alert').hide();
        $('.alert').removeClass('alert-danger').removeClass('alert-primary');
        $('.alert .message').html('');
    }
    
    function showAlert(data, isMessageNotif) {
        var message = '';
        if (isMessageNotif) {
            $('.alert').addClass('alert-primary');
            message = '<a href="/public_profile/' + data['messagingUserID'] + ' class="alert-link">' + data['messagingUserName'] + '</a> te ha inviado un mensaje!';
        }
        else { // a like
            $('.alert').addClass('alert-danger');
            message = '<a href="/public_profile/' + data['likingUserID'] + ' class="alert-link">' + data['likingUserName'] + '</a> te ha inviado un like!';
        }
        $('.alert .message').html(message);
        $('.alert').fadeIn();
        $('.alert').delay(5000).fadeOut('slow');  // hide alert after 5s
    }

    function onNotificationReceivedAlert(data, isMessageNotif) {
        emptyAlert();
        showAlert(data, isMessageNotif);
    }
    @endif

    @if ($onMessageReceived == true)
    // Notification of new message in the menu on the left
    // (i.e., list of all messages).
    function onMessageReceived(data)
    {
        console.log('onMessageReceived '); console.log(data);
        
        var active_message = '';
        if ($('.active-message').data()['userId'] == data['messagingUserID'])
            active_message = 'active-message';

        // put sender as first on the list on the left
        var chatFound = false;
        $('.messages-inbox-chat').each(function( index ) {
            if ($(this).data()['userId'] == data['messagingUserID']) {
                console.log('removing chat temporarily in left menu (list of chats)'); console.log($(this));
                chatFound = true;
                $('.messages-inbox-chat')[index].remove();

                var newHTML = 
                '<li class="messages-inbox-chat ' + active_message + '" data-user-id="' + data['messagingUserID'] + '">' +
                    '<a href="#">' +
                        '<div class="message-avatar"><i class="status-icon status-online"></i><img src="/profile_images/' + data['messagingUserImage'] + '" alt=""></div>' +

                        '<div class="message-by">' +
                            '<div class="message-by-headline">' +
                                '<h5>' + data['messagingUserName'] + '</h5>' +
                                '<span>Ahora</span>' +
                            '</div>' +
                            '<p style="font-weight: bold">' + data['message']['message'] + '</p>' +
                        '</div>' +
                    '</a>' +
                '</li>' + $('.messages-inbox-inner ul').html();

                $('.messages-inbox-inner ul').html(newHTML);
            }
        });
        
        // first time that the writer texts the user, add new chat
        if (!chatFound)
        {
            var newHTML = 
                '<li class="messages-inbox-chat" data-user-id="' + data['messagingUserID'] + '">' +
                    '<a href="#">' +
                        '<div class="message-avatar"><i class="status-icon status-online"></i><img src="/profile_images/' + data['messagingUserImage'] + '" alt=""></div>' +

                        '<div class="message-by">' +
                            '<div class="message-by-headline">' +
                                '<h5>' + data['messagingUserName'] + '</h5>' +
                                '<span>Ahora</span>' +
                            '</div>' +
                            '<p style="font-weight: bold">' + data['message']['message'] + '</p>' +
                        '</div>' +
                    '</a>' +
                '</li>' + $('.messages-inbox-inner ul').html();

                $('.messages-inbox-inner ul').html(newHTML);
        }

        // if chat is already open, add message and remove notification
        if ($('.active-message').data()['userId'] == data['messagingUserID']) {
            console.log('chat is already open, adding message to chat.');

            var newHtml = $('.message-content-inner').html() +
                '<div class="message-bubble">' +
                    '<div class="message-bubble-inner">' +
                        '<a href="/public_profile/' + data['messagingUserID'] + '"><div class="message-avatar"><img src="/profile_images/' + data['messagingUserImage'].trim() + '" alt=""></div></a>' +
                        '<div class="message-text"><p>' + data['message']['message'] + '</p></div>' +
                    '</div>' +
                    '<div class="clearfix"></div>' +
                '</div>';
            $('.message-content-inner').html(newHtml);

            // mark last message of this chat as read
            $('.active-message .message-by p').css('font-weight', 'normal');
        }
    }
    @endif

    // remove message notifications from the same sending user
    function fixMessageNotifications() {
        console.log('fixMessageNotifications().');
        var t = {};
        $('#notification-messages-ul li a').each(function( index ) {
            if ($(this).prop('href') in t) {
                $(this).parent().remove();
                
                var old_notification_number = $("#notificaton-messages-num").html();
                if (old_notification_number == "")
                    $("#notificaton-messages-num").html(0);
                else 
                    $("#notificaton-messages-num").html(parseInt(old_notification_number) - 1);
            }
            t[$(this).prop('href')] = '1';
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        fixMessageNotifications();
    });

    @if (env('USE_ABLY') == 'true')
    console.log("configuring ably.com realtime chat.")
    var ably = new Ably.Realtime('{{env('ABLY_KEY')}}');
    @else
    // TODO Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('38fa39868a294edbbd46', {
        cluster: 'eu'
    });
    @endif
    
    @if (env('USE_ABLY') == 'true')
    console.log('publish test event to TestChannelPublish. TODO comment out.');
    var channelTestPublish = ably.channels.get('TestChannelPublish');
    channelTestPublish.publish('TestPublishEvent', 'hello');

    console.log('subscribing to test channel to TestChannel, event TestEvent. TODO comment out.');
    var channelTest = ably.channels.get('public:TestChannel');
    channelTest.subscribe('TestEvent', function(data) {
    @else
    var channelTest = pusher.subscribe('TestChannel');
    channelTest.bind('TestEvent', function(data) {
    @endif
        alert(JSON.stringify(data));
    });

    @if (env('USE_ABLY') == 'true')
    var channelLike = ably.channels.get("public:LikeChannel-" + {{auth()->user()->id}});
    channelLike.subscribe('LikeEvent', function(data) {
        data = data['data'];
    @else
    var channelLike = pusher.subscribe("LikeChannel-" + {{auth()->user()->id}});
    channelLike.bind('LikeEvent', function(data) {
    @endif
        console.log('pusher.blade.php: MessageEvent ' + JSON.stringify(data));
        
        var newHTML = 
        `<li>
            <a href="/public_profile/${data["likingUserID"]}">
                <div class="drop_avatar"> 
                    <img src="/profile_images/${data["likingUserImage"]}" alt="user image">
                </div>
                <span class="drop_icon bg-gradient-primary">
                    <i class="icon-feather-thumbs-up"></i>
                </span>
                <div class="drop_text">
                    <p>
                    <strong>${data["likingUserName"]}</strong> te ha inviado un like!
                    <span class="text-link">Mira su perfil! </span>
                    </p>
                    <time> Ahora </time>
                </div>
            </a>
        </li>`;
        $("#notifications-ul").html(newHTML + $("#notifications-ul").html());
        var old_notification_number = $("#notification-number").html();
        if (old_notification_number == "")
            $("#notification-number").html(1);
        else 
            $("#notification-number").html(parseInt(old_notification_number) + 1);

        if (window.navigator && window.navigator.vibrate)
            window.navigator.vibrate(200);

        // only works if the user has clicked at least once on the page
        const audio = new Audio(url);
        audio.play();

        @if ($onMessageReceivedAlert == true)
        onNotificationReceivedAlert(data, false);
        @endif
    });

    @if (env('USE_ABLY') == 'true')
    var channelMessage = ably.channels.get("public:MessageChannel-" + {{auth()->user()->id}});
    channelMessage.subscribe('MessageEvent', function(data) {
        data = data['data'];
    @else
    var channelMessage = pusher.subscribe("MessageChannel-" + {{auth()->user()->id}});
    channelMessage.bind('MessageEvent', function(data) {
    @endif
        console.log('pusher.blade.php: MessageEvent ' + JSON.stringify(data));
        
        // remove previous notification from the sending user
        $('#notification-messages-ul li').each(function( index ) {
            if (data["messagingUserID"] == $(this).data()['userId']) {
                var old_notification_number = $("#notificaton-messages-num").html();
                $("#notificaton-messages-num").html(parseInt(old_notification_number) - 1);
                $(this).remove();
            }
        });
        
        // create a new notification (see .right-side in header.blade.php)
        console.log(data['message']['created_at']);
        var t = data['message']['created_at'].replace('T', ' ').split(/[- :]/);
        var created_at = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4])).toLocaleDateString() + ' ' + new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4])).toLocaleTimeString();
        data["messagingUserImage"] = data["messagingUserImage"];//.replace('\'%20+%20\'', '');
        var newHTML = 
            `<li class="un-read" data-user-id="${data["messagingUserID"]}">
                <a href="/messages/${data['messagingUserID']}">
                    <div class="drop_avatar"> <img src="/profile_images/${data["messagingUserImage"]}" alt="">
                    </div>
                    <div class="drop_text">
                        <strong> ${data["messagingUserName"]} </strong> <time>${created_at}</time>
                        <p style="font-weight: bold">${data['message']["message"]}</p>
                    </div>
                </a>
            </li>`;
        $('#notification-messages-ul').html($('#notification-messages-ul').html() + newHTML);

        var old_notification_number = $("#notificaton-messages-num").html();
        if (old_notification_number == "")
            $("#notificaton-messages-num").html(1);
        else 
            $("#notificaton-messages-num").html(parseInt(old_notification_number) + 1);
            
        // scroll to new message
        if ($('div .message-bubble').last()[0] != undefined)
                $('div .message-bubble').last()[0].scrollIntoView();

        if (window.navigator && window.navigator.vibrate)
            window.navigator.vibrate(200);

        // only works if the user has clicked at least once on the page
        const audio = new Audio(url);
        audio.play();

        @if ($onMessageReceived == true)
        // notify the other scripts that a message has been received
        onMessageReceived(data);
        @endif
        @if ($onMessageReceivedAlert == true)
        onNotificationReceivedAlert(data, true);
        @endif
        
        fixMessageNotifications();
    });
</script>