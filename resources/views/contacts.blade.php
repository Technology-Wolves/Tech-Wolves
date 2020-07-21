@extends('layout')
@section('title', 'Contact Us')

@section('main-section')
    {{--    Show alert messages--}}
    @if(Session::has('success-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-check-circle"></i> {{ Session::get('success-message') }}</p>
    @endif

    @if(Session::has('error-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-times-circle"></i> {{ Session::get('error-message') }}</p>
    @endif
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Contact Us</h3>
        </div>
    </div>
    <div class="about py-5">
        <div class="container py-md-5">
            <h3 class="tittle-wthree text-center">Contact Us</h3>
            <p class="sub-tittle text-center mt-4 mb-sm-5 mb-4">Dear Users, You can directly contact to the admins for your any queries. Just fill up the form given below properly. 📱</p>
            <div class="row">
                <div class="col-lg-6 contact-info-left">
                    <ul class="list-unstyled w3ls-items">
                        <li>
                            <div class="row mt-5">
                                <div class="col-3">
                                    <div class="con-icon text-right">
                                        <span class="fa fa-home"></span></div>
                                </div>
                                <div class="col-9">
                                    <h6>Address</h6>
                                    <p><b>Tech Wolves</b>
                                        <br>Satdobato,
                                        <br>Lalitpur, Nepal. </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row mt-5">
                                <div class="col-3 text-right">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="col-9">
                                    <h6>Email</h6>
                                    <a href="mailto:devish@devish.com.np">contacts@techwolves.com</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row mt-5">
                                <div class="col-3 text-right">
                                    <div class="con-icon">
                                        <span class="fa fa-phone" style="transform: rotateZ(180deg);"></span> </div>
                                </div>
                                <div class="col-9">
                                    <h6>Phone</h6>
                                    <p>+977-9843324021</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 contact-right-wthree-info login">
                    <h5 class="text-center mb-4"></h5>
                    <form method="POST" name="contact" action="{{ url('/contacts') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control name @error('name') is-invalid @enderror" id="validationDefault01" placeholder="" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control email @error('email') is-invalid @enderror" id="validationDefault02" placeholder="" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="mb-2">Subject</label>
                            <input type="text" name="subject" class="form-control subject @error('subject') is-invalid @enderror" id="password1" placeholder="" value="{{old('subject')}}">
                            @error('subject')                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="mb-2">Message</label>
                            <textarea class="form-control message @error('message') is-invalid @enderror" name="message" placeholder=""> {{old('contact-message')}}</textarea>
                            <small class="form-text text-danger">
                                @error('message')
                                <span class="message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4" onclick="return contactValidation()">Submit </button>

                    </form>

                </div>
            </div>
        </div>
        <div class="py-md-5" style="background-color: #eee;">
            <div class="container">
                <div class="container" id="contact-map">
                    <h3 class="tittle-wthree text-center">Maps</h3>
                    <p class="sub-tittle text-center mt-4 mb-sm-5 mb-4">Dear Users, You can also directly visit us! ❤</p>
                </div>
                <div class="map-wthree mt-5 p-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14133.574545079768!2d85.32267108593341!3d27.674226195864716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c50daa2fb1%3A0x6f197fa38097b530!2sPatan+Durbar+Square!5e0!3m2!1sen!2snp!4v1560333855622!5m2!1sen!2snp"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
