@extends('layout')
@section('title', 'Login')
@section('main-section')
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Login</h3>
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
                        @csrf
                        <div class="form-group mt-4">
                            <label><i class="fas fa-at"></i> {{__('Email')}}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-key"></i> {{__('Password')}}</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                <span onclick="showHidePassword();">
                                    <i class="fas fa-eye showPassword"></i>
                                    <i class="fas fa-eye-slash hidePassword"></i>
                                  </span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -30px; margin-bottom: 5px">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="margin-left: -30px;" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                &nbsp;&nbsp;&nbsp;<small class="card-text">New User??? Click <a style="text-decoration: underline;" href="{{ url('/register') }}"> here</a> to register!!!</small>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 contact-info-left"></div>
            </div>
        </div>
    </div>
@endsection

