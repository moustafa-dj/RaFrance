<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ra France</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('style/acc.css') }}">
        <link rel="stylesheet" href="{{asset('style/home.css')}}">
        <link rel="stylesheet" href="{{asset('style/service.css')}}">
        <link rel="stylesheet" href="{{asset('style/contact.css')}}">
        <link rel="stylesheet" href="{{asset('style/domain.css')}}">
        <link rel="stylesheet" href="{{ asset('style/hpage.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <nav class="nav" id="header">
            {!! SEO::generate() !!}
            <div class="container">
                <div class="nav-d">
                <a href="/"class="g"><img src="{{asset('img/logo1.png')}}"></a>
                    <input type="checkbox" id="check"/> 
                    <label for="check" class="checkbtn">
                        <img src="{{asset('img/menu.png')}}">
                    </label>
                    <ul id="link-ul">
                    <?php 
                        $domainlinks = config('domainlinks');
                    ?>
                        <li><a href="/">Home</a></li>
                        @foreach($domainlinks as $domainlink)
                            <li><a href="{{route('domaind',['id' => $domainlink->id])}}">{{$domainlink->link}}</a></li>
                        @endforeach
                        <li><a href="{{route('accessory')}}">accessoires</a></li>
                    </ul>
                    <a href="{{route('contact')}}" class="contactbtn" id="contact">Contact</a>
                </div>
            </div>
        </nav>
        <div class="slider">
            <div class="container">
                <div class="content">
                    @if(isset($domainlinks))
                        <h1 class="head">ra-france</h1>
                        <h2 class="head">montage de rayonnage</h2>
                        <p><span class="sp1">Ra France</span> est Spécialiste depuis plus de 14 ans dans<span class="sp2"> le montage de rayonnage métallique industriel</span></br> 
                            (Rack à palettes, Cantilever, Plateforme de Stockage, Mezzanine métallique, Rayonnage léger…).</p>
                        <a class="btn" href="{{route('contact')}}">demander un devis</a>
                    @else
                    @endif
                </div>
            </div>
        </div>

        @yield('home')

        <footer class="footer">
            <div class="container">
                <div class="footer-d"> 
                <?php 
                    $siteSettings = config('siteSettings');
                ?>
                        @foreach($siteSettings as $siteSetting)
                            <div class="f-in">
                                <div class="footer-head">
                                    <h3>{{$siteSetting->key}}</h3> 
                                </div>
                                <div class="footer-content">
                                    {!!$siteSetting->value !!}
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </footer>
        <div class="footer-sub">
            <div class="container"> 
                    <p>All rights reserved - 2023 - Ra France</p>
            </div>
        </div>
        <script>
        window.onscroll = function() {
            var header = document.getElementById('header');
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 0) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        };
        function moveElement() {
            var sourceElement = document.getElementById('contact');
            sourceElement.classList.add("contact");
            var targetElement = document.getElementById('link-ul');

            // Check if the screen size is smaller than a certain breakpoint
            if (window.innerWidth < 768) {
                // Move the source element into the target element
                targetElement.appendChild(sourceElement);
                sourceElement.classList.add("contact");
            } 
            }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
