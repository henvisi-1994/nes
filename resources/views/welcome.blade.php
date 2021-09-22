<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nes+</title>
        
        <!--PWA-->
        <link rel="manifest" href="manifest.json">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                
                background-image: url('background-{{mt_rand(1, 3)}}.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: rgba(0, 0, 0, 0.5);
                background-blend-mode: overlay;
                background-position: center;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight: bold;
                color: white;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .subtitle {
                color: white;
                font-weight: bold;
                margin-top: -50px;
            }

            .links {
                position: absolute;
                left: 20%;
                bottom: 30px;
            }
            
            .buttons {
                margin-top: 10px;
            }
            
            /* less or equal to X px */
            @media (max-width: 400px) {
                .links a {
                    /* display: none; */
                    display: block;
                }
            }
            
            .button {
                background-color: white; /* Green */
                border: none;
                color: black;
                padding: 5px 20px;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                font-weight: bold;
            }

            .register {
                background-color: red;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height white">
            <div class="content">
                <div class="title m-b-md">
                    Nes+
                </div>

                <div class="subtitle">
                    Una comunidad para personas que viven con VIH
                </div>

                @guest 
                {{-- if user not logged in --}}
                <div class="buttons">
                    <!--<a href="register"><span class="button register">Registrate</span></a>-->
                    <a href="login"><span class="button login">Acceder</span></a>
                </div>
                @endguest

                <div class="links">
                    <a href="">Condiciones generales</a>
                    <a href="">Privacidad</a>
                    <a href="">Cookies</a>
                    <a href="">Sobre nosotros</a>
                    <a href="">Contacto</a>
                </div>
            </div>
        </div>
        
        <!--<script>-->
        <!--    Notification.requestPermission().then((result) => {-->
        <!--        if (result === 'granted') {-->
        <!--            const options = {-->
        <!--                body: 'body, maybe a message',-->
        <!--                icon: '/frontend/assets/images/logo-mobile.png',-->
        <!--            };-->
        <!--            new Notification('NES+, title', options);-->
        <!--        }-->
        <!--    });-->
        <!--</script>-->
        
    </body>
</html>
