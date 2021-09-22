<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link href="/frontend/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="/frontend/assets/css/icons.css">

    <!-- CSS 
    ================================================== --> 
    <link rel="stylesheet" href="/frontend/assets/css/uikit.css">
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <link rel="stylesheet" href="/frontend/assets/css/tailwind.css">
    <link rel="stylesheet" href="/frontend/assets/css/custom.css">  

    @include('pusher', array('onMessageReceived' => true, 'onMessageReceivedAlert' => true))

</head> 
<body class="is_message">


    <div id="Wrapper" class="is-collapse">

        <!-- Header -->
        @include('header')

        <!-- sidebar -->
        @include('sidebar')

        <div class="alert alert-danger" role="alert" style="position: fixed; top: 0; z-index: 9999;">
            <span class="message">Someone likes you.</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Main Contents -->
        <div class="main_content"> 
  
            {{-- <span uk-toggle="target: .message-content;" class="fixed left-0 top-36 bg-red-600 z-10 py-1 px-4 rounded-r-3xl text-white"> Users</span> --}}

            <div class="messages-container">
                <div class="messages-container-inner">

                   
                    <div class="messages-inbox">
                        <div class="messages-headline">
                            <div class="input-with-icon" hidden>
                                    <input id="autocomplete-input" type="text" placeholder="Search">
                                <i class="icon-material-outline-search"></i>
                            </div>
                            <h2 class="text-2xl font-semibold">Mis mensajes</h2>
                            <a href="/">
                                <button class="button button-success"> Home     </button>
                            </a>
                            <!--<span class="absolute icon-feather-edit mr-4 text-xl uk-position-center-right cursor-pointer"></span>-->
                        </div>
                        <div class="messages-inbox-inner" data-simplebar>
                            <ul>
                                @if ($new_user != null)
                                <li class="messages-inbox-chat" data-user-id="{{$new_user->id}}">
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="/profile_images/{{$new_user->image}}" alt=""></div>
    
                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>{{$new_user->name}}</h5>
                                                <span>Ahora</span>
                                            </div>
                                            <p></p>
                                        </div>
                                    </a>
                                </li>
                                @endif

                                @foreach ($messages as $message)
                                <li class="messages-inbox-chat" data-user-id="@if ($message->user_id_to == auth()->user()->id) {{$message->user_id_from}} @else {{$message->user_id_to}} @endif">
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="/profile_images/{{$message->image}}" alt=""></div>
    
                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>{{$message->name}}</h5>
                                                <span>{{ \Carbon\Carbon::parse($message->created_at)->format('j F, Y') }}</span>
                                            </div>
                                            <p @if (!$message->isread) style="font-weight: bold" @endif>{{$message->message}}</p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                                <li class="messages-inbox-chat" data-user-id="-1">
                                    <a href="#">
                                        <div class="message-avatar"><i class="status-icon status-online"></i><img src="/frontend/assets/images/logo-mobile.png" alt=""></div>
    
                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>Team Nes+</h5>
                                                <span> Hoy </span>
                                            </div>
                                            <p> Hola, &iquest;porque no escribes a alguien? </p>
                                        </div>
                                    </a>
                                </li>
    
                            </ul>
                        </div>
                    </div>


                    <div class="message-content">

                        <div class="messages-headline">
                            <i class="icon-feather-arrow-left" style="color: #000;" id="back-button"></i>
                            <h4> Nombre Apellido </h4>
                            <a href="#" class="message-action text-red-500"><i class="icon-feather-trash-2"></i> <span class="md:inline hidden"> Borrar Conversati&oacute;n</span> </a>
                        </div>
                        
                        <div class="message-content-scrolbar" data-simplebar>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">
                                Agrabando los mensajes...
                            </div>
                            <!-- Message Content Inner / End -->
                            
                            <!-- Reply Area -->
                            <div class="message-reply" style="border-top: 0px;">
                                <textarea cols="1" rows="1" placeholder="Escribe tu mensaje..." style="border-style: solid;  max-width: 70%;"></textarea>
                                <button class="button ripple-effect">Envia</button>
                            </div>

                        </div>

                    </div>


                </div>
            </div> 
            
        </div>
        
    </div>

    
    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);
    
        (function (window, document, undefined) {
    
            'use strict';
    
            // Feature test
            if (!('localStorage' in window)) return;
    
            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;
    
            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);
    
        })(window, document);
    </script>
  
    <!-- Javascript
    ================================================== -->
    <script src="/frontend/assets/js/jquery-3.3.1.min.js"></script> 
    <script src="/frontend/assets/js/tippy.all.min.js"></script>
    <script src="/frontend/assets/js/uikit.js"></script>
    <script src="/frontend/assets/js/simplebar.js"></script>
    <script src="/frontend/assets/js/custom.js"></script>
    <script src="/frontend/assets/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script>
        var lastActiveChat = '';  // last selected chat

        // removes the message notification from userid
        function removeMessageNotifications(userid) {
            $('#notification-messages-ul li').each(function( index ) {
                if (userid == $(this).data()['userId']) {
                    var old_notification_number = $("#notificaton-messages-num").html();
                    $("#notificaton-messages-num").html(parseInt(old_notification_number) - 1);
                    $(this).remove();
                }
            });
        }

        // find the chat with the user userid from the menu on the left
        // and assign lastActiveChat
        function findChatWithSpecificUser(userid)
        {
            console.log('chat with a specific user: ' + userid);

            // find chat
            $('.messages-inbox-chat').each(function( index ) {
                if ($(this).data()['userId'] == userid)
                    lastActiveChat = $('.messages-inbox-chat')[index];
            });
        }
        
        // removes duplicated chats from the left menu
        function fixMessageInbox() {
            var foundChats = [];
            $('.messages-inbox-chat').each(function( index ) {
                if (foundChats.includes($(this).data()['userId']))
                    $(this).remove();
                else 
                    foundChats.push($(this).data()['userId']);
            });
        }

        function showMessageContent(isShown)
        {
            if (isShown) {
                $('.message-content').show();
                $('.is_message header .header_inner .right_side').css(
                        {'display': 'hidden'});
                $('header').hide();
                $('.messages-inbox .messages-headline').hide();
            }
            else {
                $('.message-content').hide();
                $('.is_message header .header_inner .right_side').css(
                        {'display': '-webkit-box', 'display': '-ms-flexbox', 'display': 'flex'});   
                $('header').show();
                $('.messages-inbox .messages-headline').show();
            }
        }

        function focusEndOfChat()
        {
            // $('div.simplebar-content').scrollTop($('.message-reply').offset().top);
            if ($('div .message-bubble').last()[0] != undefined)
                $('div .message-bubble').last()[0].scrollIntoView();
            $('.message-reply textarea').focus();
        }

        // when page is loaded, show/hide inappropriate contents
        $(document).ready(function() {
            console.log('Document ready.');

            $('.simplebar-placeholder').remove();

            // TODO removed because it doesn't show up correctly
            $('.right_side').remove();

            // position the alert at the center of the screen
            $('.alert').hide();
            $('.alert').css({'left': window.innerWidth / 2 });

            var new_height = $('.messages-inbox-inner, .message-content-scrolbar').height();
            new_height -= $('.message-reply').height();
            $('.messages-inbox-inner, .message-content-scrolbar').css({'height': new_height});
            
            // if bck is black, icon back turns white
            if ($('body').css("background-color") != 'rgb(249, 250, 251)')
                $('.messages-headline .icon-feather-arrow-left').css({'color': '#fff'});

            fixMessageNotifications();
            fixMessageInbox();

            // manage both list of chats and messages 
            // on mobiles (< 994px)
            if (window.innerWidth < 994) {
                showMessageContent(false);
                // moving to the right otherwise the user clicks back 
                // and logo and goes to /conocer because of a mis-interaction
                $('#logo').css({'position': 'absolute', 'right': '20px'});
            }
            else
            {  // desktop
                $('#back-button').hide();
                lastActiveChat = $('.messages-inbox-chat')[0];  // li
            }
            
            // chat with a specific user
            @if ($specificUserID != -1) findChatWithSpecificUser({{$specificUserID}}); showMessageContent(true); @endif          
            // chat with a specific user for the first time
            @if ($new_user != null) findChatWithSpecificUser({{$new_user->id}}); showMessageContent(true); @endif

            
            console.log("doc ready, lastActiveChat="); console.log(lastActiveChat);
            if (lastActiveChat != '')
                lastActiveChat.click();  // open chat

            // focus end of chat
            focusEndOfChat();
        });

        // only mobile - from list of messages from a user to list of all chats
        $('#back-button').click(function() {
            if (window.innerWidth < 994 && $('.message-content').is(":visible")) {
                showMessageContent(false);
            }
            
            $('.active-message')[0].classList.remove('active-message');
            $('.messages-inbox-chat')[0].classList.add('active-message');
            lastActiveChat = $('.messages-inbox-chat')[0];
        });

        $('.alert .close').click(function() {
            $(this).parent().fadeOut();
        });

        // detect ENTER pressed in textbox
        $('.message-reply textarea').keypress(function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            //alert(code);
            if (code == 13) {
                $(".message-reply button").trigger('click');
                return false;
            }
        });

        // Click on a chat on the menu on the left
        // Event delegation needed because we remove 
        // elems from the menu on the left to update it.
        $(document).on('click', '.messages-inbox-chat', function(event) {  // li
            console.log('click on a chat: ' + $(this).data()['userId']);

            if (window.innerWidth < 994) {
                showMessageContent(true);
            }

            var user_id_to = $(this).data()['userId'];
            var _this = $(this);
            if (lastActiveChat != "") 
                lastActiveChat.classList.remove('active-message');
            _this.addClass('active-message');
            lastActiveChat = _this[0];  // li
            if ($('.active-message').length != 1)
                console.log("warning, no .active-message found, " + $('.active-message').length);

            var user_id_from = {{auth()->user()->id}};
            var user_id_from_img = "{{auth()->user()->image}}";
            var user_to_img = $('.active-message .message-avatar img').attr('src');
            var user_to_name = $('.active-message .message-by h5').html();

            $('.messages-headline h4').html(user_to_name);
            $('.message-content-inner').html('');

            // Special default conversation, just not to leave the page blank
            if (user_id_to == -1) {
                $('.messages-headline h4').html(user_to_name);
                
                $('.message-content-inner').html('');
                var newHtml = 
                        '<div class="message-bubble">' +
                            '<div class="message-bubble-inner">' +
                                '<div class="message-avatar"><img src="/frontend/assets/images/logo-mobile.png" alt=""></div>' +
                                '<div class="message-text"><p> Hola, &iquest;porque no escribes a alguien? </p></div>' +
                            '</div>' +
                            '<div class="clearfix"></div>' +
                        '</div>';
                $('.message-content-inner').html(newHtml);

                // the user has no possibility to send messages to the default conversation
                $('.message-reply').hide();
                
                return false;
            }
            
            // get all messages with the clicked user
            $.get( "/fetch-messages/" + user_id_to, function( data ) {
                // alert('fetched');
                console.log('fetch-messages {{auth()->user()->id}} & ' + user_id_to);
                
                // mark last message as read
                $(_this).find('.message-by p').css('font-weight', 'normal');

                var newHtml = '';
                var lastDate = '';
                data.forEach(function(msg) {                    
                    var temp = new Date(Date.parse(msg['created_at'].replace(/-/g, '/'))).toLocaleDateString();
                    if (temp != lastDate) {
                        lastDate = temp;
                        newHtml += 
                            '<!-- Time Sign -->' +
                            '<div class="message-time-sign">' +
                                '<span>' +  temp + '</span>' +
                            '</div>';
                    }

                    if (msg['user_id_from'] == {{auth()->user()->id}}) {
                        newHtml += 
                        '<div class="message-bubble me">' +
                            '<div class="message-bubble-inner">' +
                                '<div class="message-avatar"><img src="/profile_images/{{auth()->user()->image}}" alt=""></div>' +
                                '<div class="message-text"><p>' + msg['message'] + '</p></div>' +
                            '</div>' +
                            '<div class="clearfix"></div>' +
                        '</div>';
                    }
                    else {
                        newHtml += 
                        '<div class="message-bubble">' +
                            '<div class="message-bubble-inner">' +
                                '<a href="/public_profile/' + msg['user_id_from'] + '"><div class="message-avatar"><img src="' + user_to_img + '" alt=""></div></a>' +
                                '<div class="message-text"><p>' + msg['message'] + '</p></div>' +
                            '</div>' +
                            '<div class="clearfix"></div>' +
                        '</div>';
                    }
                    $('.message-content-inner').html(newHtml);

                    // show button to send messages
                    $('.message-reply').show();

                    // remove message notification if needed
                    removeMessageNotifications(msg['user_id_from']);
                });

                focusEndOfChat();
            });
        }); // END of click on a chat

        // Send a message.
        $('.message-reply button').click(function() {
            console.log('Send a message.');

            var user_id_to_ = $('.active-message').data()['userId'];
            var message_ = $('.message-reply textarea').val();

            if (message_.length < 1)
                return false;

            // add the message to the list
            var newHtml = '';
            // newHtml += 
            //         '<!-- Time Sign -->' +
            //         '<div class="message-time-sign">' +
            //             '<span> Ahora </span>' +
            //         '</div>';

            newHtml += 
                '<div class="message-bubble me">' +
                    '<div class="message-bubble-inner">' +
                        '<div class="message-avatar"><img src="/profile_images/{{auth()->user()->image}}" alt=""></div>' +
                        '<div class="message-text"><p>' + message_ + '</p></div>' +
                    '</div>' +
                    '<div class="clearfix"></div>' +
                '</div>';

            $('.message-content-inner').html($('.message-content-inner').html() + newHtml);
            $('.message-reply textarea').val('');

            focusEndOfChat();

            // send the message to the other person and to the server
            $.ajax({
                url: "/send-message",
                data: {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    "user_id_to": user_id_to_, 
                    "message": message_,
                },
                dataType: "json",
                method: "POST",
                success: function(data) {
                    console.log('done sending.'); console.log(data);
                },
                error: function (data) {
                    if (data['responseText'] != 'ok') {
                        alert("Problema en el envio del mensaje. Probar otra vez. " + data['responseText']);
                        console.log(data);
                    }
                }
            });
    });

    // Borrar Conversacion
    $('.messages-headline a').click(function() {
        console.log('Borrar Conversacion.');
        
        if ($('.message-content').is(":visible")&& !window.confirm("Borrar permantentemente el chat?"))
            return;

        var user_id_to  = $('.active-message').data()['userId'];
        var user_to_img = $('.active-message .message-avatar img').attr('src');

        if (user_id_to == -1) {
            var newHtml = 
                $('.message-content-inner').html() +
                '<div class="message-bubble">' +
                    '<div class="message-bubble-inner">' +
                        '<div class="message-avatar"><img src="' + user_to_img + '" alt=""></div>' +
                        '<div class="message-text"><p> No puedes borrar esta conversacion </p></div>' +
                    '</div>' +
                    '<div class="clearfix"></div>' +
                '</div>';
            $('.message-content-inner').html(newHtml);
            return false;
        }

        $.get( "/delete-messages/" + user_id_to, function( data ) {
            $('.active-message').remove();
            lastActiveChat = $('.messages-inbox-chat')[0];  // li
            lastActiveChat.click();
        });
        return false;
    });

    </script>

    @include('notifications_js')

</body>
</html>