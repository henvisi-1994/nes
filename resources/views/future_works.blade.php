<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nes+</title>

    <style>
    body {
        width: 50%;
    }

    body img {
        width: 100%;
    }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height white">
        <div class="content">
            <h1>Nes+ future works</h1>
            <p>
                Hello collaborator of Nes+, here are the missing features
                and what you can do to support the VIH community.
                The VIH community thanks you!
            </p>
            
            <h2>General info</h2>
            <p>
                You can choose the feature of the list that you prefer
                and make a pull request on github. But for the moment 
                you just need to show up by writing an email to 
                vihnoestamossolos [at] gmail.com and say the list number 
                that you prefer. We are totally open to newbies in the 
                field of web development.
            </p>

            <p>
                This website was built with Laravel 8 and MySQL
                and tested on Ubuntu 20 with php 7.3, which you 
                can easily install with apt. Also, we use 
                JQuery 3.3.1 and Bootstrap 5.1.
                Once you get the repository URL, you need to: 

                <ol>
                    <li>cd ~</li>
                    <li>git clone URL</li>
                    <li>cd nes/</li>
                    <li>git checkout -b surname-name-idFeature</li>
                    <li>composer install</li>
                    <li>php artisan key:generate</li>
                    <li>php artisan serve</li>
                    <li>Browser: localhost:8000</li>
                </ol>

                Once you have your feature working on your local 
                machine, make a 
                <a href="https://www.youtube.com/watch?v=rgbCcBNZcdQ">pull request</a> 
                on github, we revise the code 
                on both PC (11") and mobile phone (6.5", 720x1600px), 
                test it on the server and add it to the mainline website.
            </p>

            <p>
                About <a href="https://laravel.com/">Laravel</a>,
                this is once popular framework to build websites.
                It is pretty easy to learn and, in case you need it,
                you can find some clues in the pages already realized.
                As Laravel uses the MVC pattern, you can find 
                models in <i>app/Models/</i>, views in <i>resources/views/</i> and 
                controllers in <i>app/Http/Controllers/</i>.
                While realizing your pages, you need to use 
                our template as is and as available in 
                <i>public/frontend/</i>. Then, you can copy-paste 
                or create from scratch (by using the template)
                the Laravel Blade pages in <i>resources/views/</i>
                and the controllers. Routes are available in 
                <i>routes/web.php</i>.
                Remember to modify the configuration file as 
                needed in <i>.env</i> for the database connection.
            </p>

            <p>
                Once you have given your feature,
                feel free to add your contribution to your CV and 
                in the page <i>resources/views/collaborators.blade.php.</i>
            </p>

            <h2>Features you can realize</h2>
            <ol>
                <li>
                    See people around you (COMPLEX, IMPORTANT)<br>
                    At the moment, <i>localhost:8000/conocer</i>
                    shows a number of random users from all around the 
                    world. We need to show people of the user's city 
                    and next to him/her. You can user the 
                    browser HTML5 localization feature or, better,
                    the city and country field in the user's profile.
                    Notice that the user is obliged to state where 
                    he lives at registration phase.
                    And of course, it should be as fast as possible.
                    Say, the page should respond within 3 seconds.
                    That's a challenge, but for example Grindr already 
                    does it really fast!<br>
                    <img src="/future_works/conocer.jpg" alt="photo" />
                </li>

                <li>
                    Footer in <i>localhost:8000/conocer (EASY)</i><br>
                    <img src="/future_works/conocer.jpg" alt="photo" />
                </li>

                <li>
                    Resize images for good fit (EASY, IMPORTANT)<br>
                    When the user uploads his images, like in Tinder,
                    he should be able to resize them so that they are 
                    shown correctly on both the /conocer page
                    and in /public_profile. We believe that 
                    cropping the image to 300x300px would be a good choice.
                    These are tools you may use <a href="https://ourcodeworld.com/articles/read/281/top-7-best-image-cropping-javascript-and-jquery-plugins"> (show)</a>.
                </li>

                <li>
                    Block and report user (EASY)<br>
                    Assigned to Agustin
                </li>

                <li>
                    Momentos, like Facebook (MEDIUM, TAKES TIME)<br>
                    Realize a Facebook-like posts page. 
                    Notice that for a first version it would be great
                    to have only the possibility to post text and not 
                    videos and photos and to see who is online and 
                    other complex stuff (also because we are not sure yet 
                    whether the server would manage all these things in 
                    a performant way).<br>
                    <img src="/future_works/momentos.jpg" alt="photo"/>
                </li>

                <li>
                    Eventos (MEDIUM, TAKES TIME)<br>
                    This page allows the users to create 
                    events with photos and description.
                    The event creator can see how will go to the event.<br>

                    <img src="/future_works/eventos.jpg" alt="photo"/>
                </li>

                <li>
                    Viajes - show all travels (EASY)<br>
                    This functionality would be a good thing 
                    to make people get to know each other via 
                    organized travels. We have already contacted a 
                    person who would organize travels and guide the 
                    people in their adventures. But for sure we 
                    will need more people, should the initiative be
                    well accepted by the users.<br>

                    Notice that here you only realize a page showing 
                    all the available tours.

                    <img src="/future_works/viajes.jpg" alt="photo"/>
                </li>

                <li>
                    Viajes - show event details (MEDIUM)<br>
                    This functionality would be a good thing 
                    to make people get to know each other via 
                    organized travels. We have already contacted a 
                    person who would organize travels and guide the 
                    people in their adventures. But for sure we 
                    will need more people, should the initiative be
                    well accepted by the users.<br>

                    Notice that here you only realize a page showing 
                    tour details. Feel free to simplify this page 
                    if needed.

                    <img src="/future_works/viajes_details.jpg" alt="photo"/>
                </li>

                <li>
                    Viajes - show similar tours (MEDIUM)<br>
                    This functionality would be a good thing 
                    to make people get to know each other via 
                    organized travels. We have already contacted a 
                    person who would organize travels and guide the 
                    people in their adventures. But for sure we 
                    will need more people, should the initiative be
                    well accepted by the users.<br>

                    Notice that here you only realize a page showing 
                    the tours similar to a give one, for example filtering
                    by nation or topic.

                    <img src="/future_works/viajes_similar.jpg" alt="photo"/>
                </li>

                <li>
                    Viajes - show tour summary (EASY)<br>
                    This functionality would be a good thing 
                    to make people get to know each other via 
                    organized travels. We have already contacted a 
                    person who would organize travels and guide the 
                    people in their adventures. But for sure we 
                    will need more people, should the initiative be
                    well accepted by the users.<br>

                    Notice that here you only realize a page showing 
                    the tour summary.

                    <img src="/future_works/viajes_summary.jpg" alt="photo"/>
                </li>
                
                <li>
                    The administrator may ban users.
                </li>
                
                <li>
                    At the end of registration phase, the email must be
                    verified before that the user can interact with the website.
                </li>
                
                <li>
                    After some time that the user uses the website, 
                    he is notified to take part to a survey hosted on 
                    google forms.
                </li>
                
                <li>
                    If the user is not online and has not read his messages
                    since quite a long time, the system sends an email
                    pointing out the new unread messages.
                </li>
            </ol>
        </div>
    </div>
</body>

</html>