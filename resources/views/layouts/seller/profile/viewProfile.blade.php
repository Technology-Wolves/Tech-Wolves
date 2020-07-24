@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Profile')
@section('main-section')
    @if(Session::has('success-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-check-circle"></i> {{ Session::get('success-message') }}</p>
    @endif

    @if(Session::has('error-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-times-circle"></i> {{ Session::get('error-message') }}</p>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid col-md-8">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">Profile Update</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        @if(\Illuminate\Support\Facades\Auth::user()->id !== $user->id)
            <p class="container mt-3 col-md-7 text-center form-control alert-danger"><i class="fas fa-times-circle"></i> Sorry, you cannot view other's profile.
                Click <a class="text-warning" href="{{ url('/viewProfile', \Illuminate\Support\Facades\Auth::user()->id) }}">here</a> to visit yours. 😃
            </p>
        @else
            <section class="content">
                <div class="container-fluid col-md-8">
                    <form method="POST" action="{{ route('updateProfile', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-4">
                            <label><i class="fas fa-file-signature"></i> Full Name</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control name @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus value="{{ $user->name }}">
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

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
                                <input id="name" type="number" class="form-control telephone @error('telephone') is-invalid @enderror" name="telephone" maxlength="10" value="{{ $user->telephone }}" autocomplete="telephone" autofocus>

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
                                <input id="name" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" onclick="return registrationValidation()">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="update-time clearfix">
                        <span class="float-left">Updated Date: {{$user->updated_at->toDateString()}}</span>
                        <span class="float-right">Updated Time: {{$user->updated_at->toTimeString()}}</span>
                    </div>

                    <p class="form-control text-center bg-warning mt-3">You joined Tech Wolves on: {{$user->created_at->toDateString()}}</p>
                </div>
            </section>
        @endif
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
