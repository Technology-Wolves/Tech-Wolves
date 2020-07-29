@extends('layout')
@section('title', 'Checkout')

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
            <h3 class="tittle-wthree text-center">Cart Checkout</h3>
        </div>
    </div>
    <div class="about py-5">
        <div class="container py-md-5">
            <h3 class="tittle-wthree text-center">Checkout</h3>
            <div class="row">
                <div class="col-lg-2 contact-info-left"></div>
                <div class="col-lg-8 contact-right-wthree-info">
                    <h5>Your total: रू. {{ $total }}</h5>
                    <form method="POST" action="{{ route('checkout') }}" enctype="multipart/form-data">
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
                            <label><i class="fas fa-money-bill-alt"></i> Payment Type: </label>
                            <div class="col-md-12">
                                <select class="form-control @error('paymentType') is-invalid @enderror" name="paymentType" autofocus>
                                    <option selected value="">Select Payment Type</option>
                                    <option value="eWallet">E-Wallet</option>
                                    <option value="cash on delivery">Cash on Delivery</option>
                                    <option value="credit or debit card">Credit / Debit Card</option>
                                </select>
                                @error('paymentType')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Checkout') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 contact-info-left"></div>
            </div>
        </div>
    </div>
@endsection
