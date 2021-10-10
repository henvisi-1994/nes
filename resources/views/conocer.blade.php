<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="/frontend/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Conocer</title>
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="/frontend/assets/css/custom.css">

    <!-- Font Awasome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @include('pusher', array('onMessageReceived' => false, 'onMessageReceivedAlert' => false))

</head>

<body>
    <div id="wrapper"
        x-data="{ 'showModal': false , 'nombre':'Nombre','edad':0 ,'genero':'Genero','country':'Pais','city':'Ciudad','imagen':'Imagen'}">
        @keydown.escape="showModal = false" x-cloak>
        @include('header')

        @include('sidebar')

        <!-- Main Contents -->
        <div class="main_content">

            <div class="mcontainer">
                @include('breadcrums')

                <div class="flex justify-between items-center relative md:mb-4 mb-3">
                    <div class="flex-1">
                        <h2 class="text-base font-semibold primary-color"> Otra manera de conocerse </h2>
                    </div>
                    <!-- <a href="#offcanvas-create" uk-toggle class="flex items-center justify-center z-10 h-10 w-10 rounded-full bg-blue-600 text-white absolute right-0"
                    data-tippy-placement="left" title="Create New Album">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    </a> -->
                </div>

                {{-- security --}}
                @auth

                    <div class="grid md:grid-cols-4 grid-cols-2 gap-3 mt-5">
                        @forelse ($users as $user)
                            <div>
                                <div
                                    class="bg-green-400 max-w-full lg:h-56 h-48 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                                    <a href="/public_profile/{{ $user->id }}">
                                        <img src="/profile_images/{{ $user->image }}"
                                            class="w-full h-full absolute object-cover inset-0">
                                    </a>
                                    <!-- overly-->
                                    <div
                                        class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full">
                                    </div>
                                    <div
                                        class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small flex items-center">
                                        <div class="flex-1">
                                            <div class="text-lg" style="font-weight: bold;">
                                                <a href="/public_profile/{{ $user->id }}">
                                                    {{ $user->name }},{{ date_diff(new \DateTime($user->birthday), new \DateTime())->format('%y') }}
                                                </a>
                                            </div>
                                            <div class="       text-sm">
                                                @if ($user->city != '') {{ $user->city }}, @endif
                                                {{ $user->country }}
                                            </div>
                                            <div class="flex space-x-3 lg:flex-initial text-3xl">
                                                @if (in_array($user->id, $stars))
                                                    <a href="#"><i class="fa fa-star colored text-yellow-500"
                                                            data-userid="{{ $user->id }}"></i></a>
                                                @else
                                                    <a href="#"><i class="fa fa-star  colored"
                                                            data-userid="{{ $user->id }}"></i></a>
                                                @endif
                                                <a href="/messages/{{ $user->id }}"><i class="fa fa-comment"></i></a>
                                                @if (in_array($user->id, $likes))
                                                    <a href="#"><i class="fa fa-heart text-red-600 colored"
                                                            data-userid="{{ $user->id }}"></i></a>
                                                @else
                                                    <a href="#"><i class="fa fa-heart"
                                                            data-userid="{{ $user->id }}"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- <i class="btn-down text-2xl uil-cloud-download px-1"></i> --}}
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p>Ningun usuario a&uacute;n</p>
                        @endforelse
                    </div>

                @endauth


            </div>
        </div>
        <section class="flex flex-wrap p-4 h-full items-center">
            <!--Overlay-->
            <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5)" x-show="showModal"
                :class="{ 'absolute inset-0 z-10 flex items-center justify-center': showModal }">
                <!--Dialog-->
                <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"
                    x-show="showModal" @click.away="showModal = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90">

                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <span class="text-2xl font-bold" x-text="nombre"></span>
                        <span class="text-2xl font-bold" x-text="edad"></span>
                        <div class="cursor-pointer z-50" @click="showModal = false">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="grid grid-cols-2">
                        <div>
                            <img class="object-contain md:object-scale-down pr-3" :src="imagen" alt="">
                        </div>
                        <div>
                            <div>
                                <span x-text="genero"></span>,
                                <span x-text="country"></span>,
                                <span x-text="city"></span>
                            </div>

                            <div>
                                <b>Situación Sentimental</b>
                                <div>Soltero</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div>
                                    <b>Altura</b>
                                    <div>1.90</div>
                                </div>
                                <div>
                                    <b>Peso</b>
                                    <div>70kg</div>
                                </div>
                            </div>
                            <div>
                                <b>Acerca de mi</b>
                                <p>Mi nombre es Tom Parker y me gusta disfrutar de las saluidas y apasionado del cine.
                                    En mi
                                    tiempo libre veo documentales y realizo ilustraciones</p>
                            </div>
                            <div>
                                <b>Lo que realmente quiero</b>
                                <p>Chatear y conocer gente nueva</p>
                            </div>
                            <div>
                                <b>Abierto a</b>
                                <p>Relaciones serias</p>
                            </div>

                        </div>
                    </div>


                    <!--Footer-->
                </div>
                <!--/Dialog -->
            </div><!-- /Overlay -->

        </section>

    </div>


    <!-- For Night mode -->
    <script>
        (function(window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);

        (function(window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function(event) {
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

    <script>
        $(document.body).on('click', '.fa-star', function() {
            var userid = $(this).data()['userid'];
            var _this = $(this);
            if ($(this).css("color") == "rgb(255, 255, 255)") {
                $.get("/star/" + userid, function(data) {
                    _this.css({
                        color: "yellow"
                    });
                })
            } else {
                $.get("/unstar/" + userid, function(data) {
                    _this.css({
                        color: "rgb(255, 255, 255)"
                    });
                })
            }
        });

        $(document.body).on('click', '.fa-heart', function() {
            var userid = $(this).data()['userid'];
            var _this = $(this);
            if ($(this).css("color") == "rgb(255, 255, 255)") {
                $.get("/like/" + userid, function(data) {
                    console.log(data)
                    _this.css({
                        color: "red"
                    });
                })
            } else {
                $.get("/unlike/" + userid, function(data) {
                    console.log(data)
                    _this.css({
                        color: "rgb(255, 255, 255)"
                    });
                })
            }
        });

        $(document).ready(function() {
            $(".fa-star:not(.colored)").css({
                color: "rgb(255, 255, 255)"
            });
            $(".fa-heart:not(.colored)").css({
                color: "rgb(255, 255, 255)"
            });
            $(".fa-comment").css({
                color: "rgb(255, 255, 255)"
            });
        });
    </script>

    @include('notifications_js')

</body>

</html>
