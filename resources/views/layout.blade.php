<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#00f163">
    <title>Tech Wolves - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-head.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logo-head.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('webfonts/all.css') }}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
<div id="wrapper">
    <div class="nav-holder">
        <div class="nav clearfix">
            <div class="logo float-left">
                <a href="{{ url('/') }}">
                    <img src="images/logo.png" alt="Project's Logo">
                </a>
            </div>
            <div class="burger-lines float-right" onclick="showMenu()">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
        </div>
    </div>
    <div class="nav-lists">
        <ul>
            <li class="fas fa-home"><a href="{{ url('/') }}">Home</a></li>
            <li class="fas fa-address-card"><a href="{{ url('/about') }}">About</a></li>
            <li class="fas fa-phone-alt"><a href="{{url('/contacts')}}">Contact</a></li>
            <li class="fas fa-map-marked-alt"><a href="{{ url('/contacts#contact-map') }}">Maps</a></li>
            <li class="fas fa-box"><a href="{{ url('/products') }}">Products</a></li>
            <li class="far fa-user-circle"><a href="{{ url('/login') }}">Login</a></li>
            <li class="fas fa-user-plus"><a href="{{ url('/register') }}">Register</a></li>
            <li class="fas fa-question"><a href="#">FAQs</a></li>
        </ul>
    </div>

    {{--  Dynamic Section Begins  --}}

    @yield('main-section')

    {{--    Dynamic Section Ends --}}

    <div class="footer-holder">
        <div class="footer-info container py-sm-3 text-danger">
            <div class="row footer-grids">
                <div class="col-lg-3 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
                    <h2> <a class="navbar-brand mb-3" href="index.html">Tech Wolves</a>
                    </h2>
                    <p class="mb-3">Tech Wolf is a leading online acessories non-profit oragamization in Nepal.</p>
                </div>
                <div class="col-lg-3 col-sm-6 mb-md-0 mb-sm-5 mb-4">
                    <h4 class="mb-4">Address Info</h4>
                    <p><span class="footer-icon fa mr-2 fa-map-marker"></span>Satdobato, <span>Lalitpur, NP.</span></p>
                    <p class="phone py-2"><span class="footer-icon fa mr-2 fa-phone" style="transform: rotateZ(180deg);"></span> +977-9843324021 </p>
                    <p><span class="footer-icon fa mr-2 fa-envelope"></span><a href="mailto:devish@devish.com.np">contacts@techwolves.com</a></p>
                </div>
                <div class="col-lg-2 col-sm-6 mb-lg-0 mb-sm-5 mb-4">
                    <h4 class="mb-4">Quick Links</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li class="my-2"><a href="#">Contact</a></li>
                        <li><a href="#">Products</a></li>
                        <li class="mt-2"><a href="#">Privacy Ploicy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <h4 class="mb-4">Subscribe Us</h4>
                    <p class="mb-3">Subscribe to our newsletter</p>
                    <form action="#" method="post" class="d-flex newsletter-w3pvt" name="subscribe">
                        @csrf
                        <input type="email" id="email" class="email" name="subscribe-email" placeholder="Enter your email here">
                        <button type="submit" class="btn" name="subscribe-submit" onclick="return subscribeValidation()">Subscribe</button>
                    </form>
                    <div class="icon-social mt-4">
                        <a href="https://www.facebook.com" target="_blank">
                            <i class="mx-2 fab fa-facebook-f fb"></i>
                        </a>
                        <a href="https://www.twitter.com" target="_blank">
                            <i class="mx-2 fab fa-twitter tw"></i>
                        </a>
                        <a href="https://www.youtube.com" target="_blank">
                            <i class="mx-2 fab fa-youtube yt"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank">
                            <i class="mx-2 fab fa-instagram ig"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p> &copy; Tech Wolves 2020. All Rights Reserved.</p>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f01b45c760b2b560e6fc4a4/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
