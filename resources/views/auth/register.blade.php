@extends('layout')
@section('title', 'Registration')
@section('main-section')
    @if($errors->any())
        <p class="container mt-3 alert-danger alert"><i class="far fa-times-circle"></i> {{ __('Please fill up the form properly!') }}</p>
    @endif
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Registration</h3>
        </div>
    </div>
    <div class="about py-5">
        <div class="container py-md-5">
            <h3 class="tittle-wthree text-center">Registration</h3>
            <p class="sub-tittle text-center mt-4 mb-sm-5 mb-4">Please fill up the given form clearly for registering at your first try... <br> 😊😊😊</p>
            <div class="row">
                <div class="col-lg-3 contact-info-left"></div>
                <div class="col-lg-6 contact-right-wthree-info login">
                    <h5 class="text-center mb-4"></h5>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label><i class="fas fa-file-signature"></i> Full Name</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-at"></i> Email</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-mobile-alt"></i> Phone</label>
                            <div class="col-md-12">
                                <input id="name" type="number" class="form-control telephone @error('telephone') is-invalid @enderror" name="telephone" maxlength="10" value="{{ old('telephone') }}" autocomplete="telephone" autofocus>

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-map-marker-alt"></i> Address</label>
                           <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-transgender-alt"></i> Gender: </label>
                            <div class="col-md-12">
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender')}} " autocomplete="gender" autofocus>
                                    <option selected value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-unlock-alt"></i> Password</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
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

                        <div class="form-group mt-4">
                            <label><i class="fas fa-unlock-alt"></i> Confirm Password</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-filter"></i> Registration Type: </label>
                            <div class="col-md-12">
                                <select class="form-control @error('regType') is-invalid @enderror" name="regType" autofocus>
                                    <option selected value="">Select Registration Type</option>
                                    <option value="seller">Seller</option>
                                    <option value="buyer">Buyer</option>
                                </select>
                                @error('regType')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4 mb-4 custom-file">
                            <label for="profileImage" ><i class="fas fa-unlock-alt"></i> Choose Profile Image</label><br>
                            <div class="col-md-12">
                                <input type="file" class="mb-4  @error('profileImage') is-invalid @enderror" id="profileImage" name="profileImage">
                                @error('profileImage')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" onclick="return registrationValidation()">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-3 contact-info-left"></div>
            </div>
        </div>
    </div>
@endsection
