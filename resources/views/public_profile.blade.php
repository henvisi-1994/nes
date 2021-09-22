<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="/frontend/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Profile</title>
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

    @include('pusher', array('onMessageReceived' => true, 'onMessageReceivedAlert' => false))

</head> 
<body>
   

    <div id="wrapper">

        <!-- Header -->
        @include('header')

        @include('sidebar')

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">

                @include('error')

                <!--  breadcrumb -->
                {{-- <div class="breadcrumb-area py-0">
                    <div class="breadcrumb">
                        <ul class="m-0">
                            <li>
                                <a href="index.html">Groups</a>
                            </li>
                            <li class="active">
                                <a href="#">Create New Page </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}


                <!-- create page-->
                {{-- <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">   --}}
                <div class="max-w-2xl m-auto shadow-md rounded-md bg-white">  
 
                    @foreach($user as $u)
                    
                    <div class="p-7 space-y-5">
                        <div>
                            <img id="photo_preview" @if ($u->image == "") src="person-icon.png" @else src="/profile_images/{{$u->image}}" @endif class="img-fluid img-thumbnail rounded mx-auto d-block" alt="profile photo" style="border-radius: 50%; width: 50%;" />
                            <input id="image" type="file" name="image" style="display: none" />
                        </div>    
                    </div>

                    <!-- form header -->
                    <div class="text-center border-b py-4">
                        <h3 class="font-bold text-lg"> {{$u->name}} </h3>
                    </div>
                    
                    <div class="mt-4 move-right">
                        <span>Nombre: </span>
                        <span>{{$u->name}}</span>
                    </div>

                    <div class="mt-4 move-right">
                        <span>Genero: </span>
                        <span>@if ($u->gender == 'man') Hombre @else Mujer @endif</span>
                    </div>

                    <div class="mt-4 move-right">
                        <span>Pa&iacute;s: </span>
                        <span>{{$u->country}}</span>
                    </div>

                    @if ($u->city != "")
                    <div class="mt-4 move-right">
                        <span>Ciudad: </span>
                        <span>{{$u->city}}</span>
                    </div>
                    @endif

                    <div class="mt-4 move-right">
                        <span>Cumplea&ntilde;os: </span>
                        <span>{{ \Carbon\Carbon::parse($u->birthday)->format('j F, Y') }}</span>
                    </div>

                    <div class="mt-4" style="padding-top: 20px; padding-bottom: 20px; width: 30%; margin: auto;">
                        <a href="/messages/{{$u->id}}">
                            <button type="button" style="-webkit-tap-highlight-color: rgba(0,0,0,0);
    -webkit-text-size-adjust: 100%;
    box-sizing: inherit;
    font: inherit;
    margin: 0;
    overflow: visible;
    text-transform: none;
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    user-select: none;
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
    -webkit-appearance: button;">Enviar mensaje</button></a>
                    </div>

                    @endforeach
                        
                </div>

        
            </div>
        </div>
        
    </div>

    <!-- open chat box -->
    @include('aside')

    
    <!-- For Night mode -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
</body>
</html>