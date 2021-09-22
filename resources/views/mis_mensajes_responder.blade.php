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
    <title>Nes+</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nes+">

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
        <header>
            <div class="header_wrap">
                <div class="header_inner mcontainer">
                    <div class="left_side">
                        
                        <div id="logo">
                            <a href="/"> 
                                <img src="/frontend/assets/images/logo.png" alt="">
                                <img src="/frontend/assets/images/logo-mobile.png" class="logo_mobile" alt="">
                            </a>
                        </div>
                    </div>
                     
                    <!-- search icon for mobile -->
                    <!--<div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>-->
                    <!--<div class="header_search"><i class="uil-search-alt"></i> -->
                    <!--    <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">-->
                    <!--</div>-->
    
                    <div class="right_side">
    
                        <div class="header_widgets">
                            <a href="#" class="is_icon" uk-tooltip="title: Notifications">  <!-- bell icon -->
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                                <span id="notification-number">{{count($notifications)}}</span>
                            </a>
                            <div uk-drop="mode: click" class="header_dropdown">
                                 <div  class="dropdown_scrollbar" data-simplebar>
                                     <div class="drop_headline">
                                         <h4>Notificaci&ograve;nes </h4>
                                         <div class="btn_action">
                                            <a href="#" data-tippy-placement="left" title="Mark as read all">
                                                <ion-icon name="checkbox-outline"></ion-icon>
                                            </a>
                                        </div>
                                     </div>
                                     <ul id="notifications-ul">
                                         @forelse ($notifications as $not)
                                        <li>
                                            <a href="/public_profile/{{$not->id}}">
                                                <div class="drop_avatar"> 
                                                    <img src="/profile_images/{{$not->image}}" alt="user image">
                                                </div>
                                                <span class="drop_icon bg-gradient-primary">
                                                    <i class="icon-feather-thumbs-up"></i>
                                                </span>
                                                <div class="drop_text">
                                                    <p>
                                                    <strong>{{$not->name}}</strong> te ha inviado un like!
                                                    <span {{--class="text-link"--}} >Mira su perfil!</span>
                                                    </p>
                                                    <time> {{-- Ahora --}} </time>
                                                </div>
                                            </a>
                                        </li>
                                        @empty
                                        
                                        @endforelse
                                     </ul> 
                                 </div>
                            </div> 

                            <!-- Message -->
                            <a href="#" class="is_icon" uk-tooltip="title: Message">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg> <!-- message icon -->
                                <span id="notificaton-messages-num">{{$notifications_messages->count()}}</span>
                            </a>
                            <div uk-drop="mode: click" class="header_dropdown is_message">
                                <div  class="dropdown_scrollbar" data-simplebar>
                                    <div class="drop_headline">
                                         <h4>Mensajes </h4>
                                        <div class="btn_action">
                                            <a href="#" data-tippy-placement="left" title="Mark as read all">
                                                <ion-icon name="checkbox-outline"></ion-icon>
                                            </a>
                                        </div>
                                    </div>
                                    <!--<input type="text" class="uk-input" placeholder="Search in Messages">-->
                                    <ul id="notification-messages-ul">
                                        @forelse ($notifications_messages as $message)
                                        <li class="un-read">
                                            <a href="/messages/{{$message->messagingUserID}}">
                                                <div class="drop_avatar"> <img src="" alt="">
                                                </div>
                                                <div class="drop_text">
                                                    <strong> {{$message->messagingUserName}} </strong> <time></time>
                                                    <p>  {{$message->message}}  </p>
                                                </div>
                                            </a>
                                        </li>
                                        @empty
                                        
                                        @endforelse
                                    </ul>
                                </div>
                                <a href="#" class="see-all"> Todos los mensajes</a>
                            </div>
         
        
                            <a href="#">
                                <img src="/profile_images/{{auth()->user()->image}}" class="is_avatar" alt="">
                            </a>
                            <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                                <a href="/profile" class="user">
                                    <div class="user_avatar">
                                        <img src="/profile_images/{{auth()->user()->image}}" alt="">
                                    </div>
                                    <div class="user_name">
                                        <div> {{auth()->user()->name}} </div>
                                    </div>
                                </a>
                                <hr>
                                <a href="/profile">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                    Mi perfil
                                </a>
                                <a href="#" id="night-mode" class="btn-night-mode">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                      </svg>
                                     Night mode
                                    <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                                </a>
                                <a href="/logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Log Out 
                                </a>

                                
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">
            <div class="sidebar_header"> 
                <img src="/frontend/assets/images/logo.png" alt="">
                <img src="/frontend/assets/images/logo-mobile.png" class="logo-icon" alt="">

                <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></span>

            </div>
        
        </div> 
        
        <div class="alert alert-danger" role="alert" style="position: fixed; top: 0; z-index: 9999;">
            <span class="message"><!-- message alert for mobile --></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Main Contents -->
        <div class="main_content"> 
  
            <span id="back-button" uk-toggle="target: .message-content;" class="fixed left-0 top-36 bg-red-600 z-10 py-1 px-4 rounded-r-3xl text-white"> Atr&agrave;s </span>

            <div class="messages-container">
                <div class="messages-container-inner">

                   
                    <div class="messages-inbox">
                        <div class="messages-headline">
                            <div class="input-with-icon" hidden>
                                    <input id="autocomplete-input" type="text" placeholder="Search">
                                <i class="icon-material-outline-search"></i>
                            </div>
                            <h2 class="text-2xl font-semibold">Mensajes</h2>
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
                                                <span></span>
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
                            <h4> Stella Johnson </h4>
                            <a href="#" class="message-action text-red-500"><i class="icon-feather-trash-2"></i> <span class="md:inline hidden"> Borrar Conversac&igrave;on</span> </a>
                        </div>
                        
                        <div class="message-content-scrolbar" data-simplebar>

                            <!-- Message Content Inner -->
                            <div class="message-content-inner">
                                 
                                 <!--Complete with messages with JQuery   -->
                                 
                            </div>
                            <!-- Message Content Inner / End -->
                            
                            <!-- Reply Area -->
                            <div class="message-reply">
                                <textarea cols="1" rows="1" placeholder="Escribe tu mensaje" style="border-style: solid;"></textarea>
                                <button class="button ripple-effect">Enviar</button>
                            </div>

                        </div>

                    </div>


                </div>
            </div> 
            
        </div>
        
    </div>
    
    <div id="offcanvas-chat" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar bg-white p-0 w-full lg:w-80 shadow-2xl">

            <div class="absolute bg-white z-10 w-full -mt-5 lg:-mt-2 transform translate-y-1.5 py-2 border-b items-center flex"
                id="search" hidden>
                <input type="text" placeholder="Search.." class="flex-1">
                <ion-icon name="close-outline" class="text-2xl hover:bg-gray-100 p-1 rounded-full mr-4 cursor-pointer"
                    uk-toggle="target: #search;animation: uk-animation-slide-top-small"></ion-icon> 
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

    <!-- Bootstrap -->
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
                // lastActiveChat.click();
                if (window.innerWidth < 994)
                    $('#back-button').click();
                $('#back-button').show();
            }
            else {
                $('#back-button').click();
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

            // $('.simplebar-placeholder').remove();

            // TODO removed because it doesn't show up correctly
            // $('.right_side').remove();

            // position the alert at the center of the screen
            $('.alert').hide();
            if (window.innerWidth > 994)  // on desktop, center alert
                $('.alert').css({'left': window.innerWidth / 2 });

            // fixMessageNotifications();
            fixMessageInbox();

            // manage both list of chats and messages 
            // on mobiles (< 994px)
            if (window.innerWidth < 994) {
                $('#back-button').click();
                $('#back-button').hide();
            }
            else
            {  // desktop
                lastActiveChat = $('.messages-inbox-chat')[0];  // li
            }
            
            // chat with a specific user
            @if ($specificUserID != -1) 
                console.log('chat with specific user'); 
                findChatWithSpecificUser({{$specificUserID}});
                showMessageContent(true); 
                if(window.innerWidth < 994)
                    $('#back-button').click();
            @endif
            // chat with a specific user for the first time
            @if ($new_user != null)
                console.log('chat with specific user for the first time'); 
                findChatWithSpecificUser({{$new_user->id}});
                showMessageContent(true);
                if(window.innerWidth < 994)
                    $('#back-button').click();
            @endif

            
            console.log("doc ready, lastActiveChat="); console.log(lastActiveChat);
            if (lastActiveChat != '')
                lastActiveChat.click();  // open chat

            // focus end of chat
            focusEndOfChat();
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
            
            showMessageContent(true);
            // $('#button-back').click();
            // $('#button-back').show();

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
            
            // load a gif to inform the user about fetching
            var tempHTML =
                '<div class="message-bubble">' +
                    '<div class="message-bubble-inner">' +
                        '<div class="message-avatar"><img src="/frontend/assets/images/logo-mobile.png" alt=""></div>' +
                        '<div class="message-text">' +
                            '<!-- Typing Indicator -->' +
                            '<div class="typing-indicator">' +
                                '<span></span>' +
                                '<span></span>' +
                                '<span></span>' +
                            '</div>' +
                        '</div>' +        
                    '</div>' +
                    '<div class="clearfix"></div>' +
                '</div>';
            $('.message-content-inner').html(tempHTML);
            
            // get all messages with the clicked user
            $.get( "/fetch-messages/" + user_id_to, function( data ) {
                // alert('fetched');
                console.log('fetch-messages {{auth()->user()->id}} & ' + user_id_to);
                
                // mark last message as read
                $(_this).find('.message-by p').css('font-weight', 'normal');
                $('.message-content-inner').html('');

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
    
    $("#back-button").click(function() {
        $(this).hide();
    });

    // Borrar Conversacion
    $('.messages-headline a').click(function() {
        console.log('Borrar Conversacion.');
        
        if ($('.message-content').is(":visible") && !window.confirm("Borrar permantentemente el chat?"))
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