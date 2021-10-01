<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="/frontend/assets/images/favicon.png" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Nes+</title>
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

</head>

<body>


    <div id="wrapper">

        <!-- Header -->
        @include('header')
        @include('sidebar')

        <!-- Main Contents -->
        <div class="main_content">
            <div class="mcontainer">

                {{-- @include('error') --}}

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

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
                {{-- <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20"> --}}
                <div class="max-w-2xl m-auto shadow-md rounded-md bg-white">

                    <div class="p-7 space-y-5">
                        <form method="POST" action="{{ route('register') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <img id="photo_preview" src="avatar-icon.png"
                                                class="img-fluid img-thumbnail rounded mx-auto d-block"
                                                alt="profile photo" style="border-radius: 50%; width: 50%;" />
                                            <input id="image" type="file" name="image" style="display: none" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h1 class="titulo-principal">Crear una cuenta nueva</h1>
                                        <!-- Name -->
                                        <div>
                                            <x-label id="titulo" for="name" :value="__('Nombre')" />

                                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                value="" required autofocus />
                                        </div>

                                        <!-- Gender -->
                                        <div>
                                            <x-label for="gender" id="titulo" :value="__('Genero')" />

                                            <select name="gender" class="block mt-1 w-full border-gray-300"
                                                style="border-radius: 10px;">
                                                <option value="man" selected>Hombre</option>
                                                <option value="woman">Mujer</option>
                                            </select>
                                        </div>

                                        <!-- Birthday -->
                                        <div>
                                            <x-label id="titulo" for="birthday" value="{!! html_entity_decode('Cumplea&ntilde;os') !!}" />

                                            <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                                                required autofocus value="" />
                                        </div>

                                        <!-- State -->
                                        <div>
                                            <x-label id="titulo" for="state" value="{!! html_entity_decode('Pa&iacute;s') !!}" />

                                            <select id="country_select" name="country"
                                                class="block mt-1 w-full border-gray-300" style="border-radius: 10px;">
                                                <?php
                                                ($file = fopen('cities.txt', 'r')) or exit('Unable to open file!');
                                                
                                                while (!feof($file)) {
                                                    $n = fgets($file);
                                                    $s = '';
                                                    echo '<option ' . $s . '>' . $n . '</option>';
                                                }
                                                
                                                fclose($file);
                                                ?>
                                            </select>
                                        </div>

                                        <!-- City -->
                                        <div>
                                            <x-label id="titulo" for="city" value="{!! html_entity_decode('Ciudad') !!}" />

                                            <select id="city_select" name="city"
                                                class="block mt-1 w-full border-gray-300" style="border-radius: 10px;">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-label id="titulo" for="email" :value="__('Email')" />

                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                required value="" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-label id="titulo" for="password" value="{!! html_entity_decode('Contrase&ntilde;a') !!}" />

                                            <x-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" autocomplete="password" />
                                        </div>

                                        <!-- cbox_terms -->
                                        <div class="mt-4">
                                            <input type="checkbox" id="cbox_terms" name="cbox_terms"
                                                style="height: 20px; width: 10%;"> <label for="cbox_terms">Para
                                                continuar usted debe de aceptar <a href="#">Nes+ términos de uso</a> y
                                                <a href="#">politica de privacidad</a> </label>
                                        </div>
                                        <div class="flex items-center justify mt-4">
                                            <x-button class="btn btn-block" id="button_register">
                                                {{ __('Registrarse') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>


            </div>
        </div>

    </div>

    @include('footer')
    <!-- open chat box -->
    @include('aside')


    <!-- For Night mode -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        // Update cities of the country
        $("#country_select").change(function() {
            var country_val = $(this).val();
            $.post("https://countriesnow.space/api/v0.1/countries/cities", {
                    country: country_val
                })
                .done(function(data) {
                    var cities = '';
                    data['data'].forEach(element => {
                        cities += '<option>' + element + '</option>';
                    });
                    $("#city_select").html(cities);
                })
                .fail(function(data) {
                    $("#city_select").html('');
                });
        });

        // Button Registrame is clicked
        $("#button_register").click(function() {
            if ($("#cbox_terms").prop('checked') == false) {
                alert("Usted tiene que aceptar nuestros terminos de uso y privacidad.");
                return false;
            }
            if ($("#country_select").val().includes("--")) {
                alert("Usted tiene que indicar un Pais.");
                return false;
            }
            if ($("#city_select").val().includes("--")) {
                alert("Usted tiene que indicar una ciudad.");
                return false;
            }

            return true;
        });

        // Choose a photo
        $('#photo_preview').on('click', function() {
            $('#image').trigger('click');
        });

        // On photo chosen, change img preview
        $('#image').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#photo_preview').attr('src', 'person_photo.png');
            }
        });
    </script>
</body>

</html>
