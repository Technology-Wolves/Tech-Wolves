@extends('layout')
@section('title', 'Registration')
@section('main-section')
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Registration</h3>
        </div>
    </div>
    <div class="about py-5">
        <div class="container py-md-5">
            <h3 class="tittle-wthree text-center">Login</h3>
            <p class="sub-tittle text-center mt-4 mb-sm-5 mb-4">Welcome Back, Dear User!!!</p>
            <div class="row">
                <div class="col-lg-3 contact-info-left"></div>
                <div class="col-lg-6 contact-right-wthree-info login">
                    <h5 class="text-center mb-4"></h5>
                    <form action="#" method="POST" name="loginValidationForm">

                        <div class="form-group mt-4">
                            <label><i class="fas fa-at"></i> Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-key"></i> Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4 float-left" name="login" onclick="return loginValidation()">Submit</button>
                    </form>
                </div>

                <div class="col-lg-3 contact-info-left"></div>
            </div>
        </div>
    </div>
@endsection
