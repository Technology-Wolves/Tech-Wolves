@extends('layout')
@section('title', 'Home')
@section('main-section')
    @if(Session::has('message'))
        <p class="container mt-3 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="containerr">
        <div class="message-holder">
            <div class="message-button-holder">
                <div class="message">
                    <h1>See the different product</h1>
                    <h2>around the site</h2>
                    <h3>and simply order it.</h3>
                </div>
            </div>
            <div class="hireButton">
                <a href="{{ url('/login') }}" target="">Login!</a>
            </div>
        </div>
    </div>

    <div class="section-holder">
        <div class="section">
            <div class="container what-we-do text-center p-4">
                <h3 class="text-center">About Us</h3>
                <p class="p-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima alias perferendis, aliquam ab maxime ipsa natus fuga exercitationem, dolorem nostrum assumenda enim soluta nesciunt reiciendis quis, dicta quod beatae quibusdam. Lorem ipsum dolor sit amet... </p>
                <a class="custom-btn btn-primary" href="{{ url('/about') }}">Read More &raquo;</a>
            </div>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="container carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/img1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Razer - Blade Stealth</h5>
                    <p>
                        Best Buy
                        Razer - Blade Stealth 13.3" 4K Ultra HD Touch-Screen Gaming Laptop- Intel Core i7- 16GB Memory- NVIDIA GeForce MX150 - 512GB SSD - Black CNC Aluminum
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/img2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Asus TUF</h5>
                    <p>Asus TUF Gaming Laptop FX504 15.6” Full HD IPS-LEVEL, 8th Gen Intel Core i5-8300H (Up to 3.9GHz), GeForce GTX 1050 Ti, 8GB DDR4 2666MHz, 256GB M.2 SSD, Gigabit WiFi, Windows 10 - FX504GE-AH53</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/img3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Alienware AW17R4-7345SLV-PUS</h5>
                    <p>Alienware AW17R4-7345SLV-PUS 17" Laptop (7th Generation Intel Core i7, 16GB RAM, 1TB HDD, Silver) VR Ready with NVIDIA GTX 1070</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="last-content py-5">
        <div class="container py-md-3 text-center">
            <div class="last-lavi-inner-content px-lg-5">
                <h3 class="mb-4 tittle-wthree">Get started with <span>Online </span> Ordering !</h3>
                <p class="px-lg-5">You are only few steps away from getting close to us. <br>If you haven't registerd yet, what are you waiting for... Just simply register and order our products online <br> -- Tech Wolves --</p>
                <div class="buttons mt-md-4 mt-3">
                    <a href="{{ url('/login') }}" class="custom-btn"  style="color: #fff !important;">Login</a>
                    <a href="{{ url('/register') }}" class="custom-btn"  style="color: #fff !important;">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
