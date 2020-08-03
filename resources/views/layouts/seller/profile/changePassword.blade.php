@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Change Password')
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
                        <h1 class="m-0 text-dark">Change Password</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        @if(\Illuminate\Support\Facades\Auth::user()->id !== $user->id)
            <p class="container mt-3 col-md-7 text-center form-control alert-danger"><i class="fas fa-times-circle"></i> Sorry, you cannot change other's password.
                Click <a class="text-warning" href="{{ url('/changePassword', \Illuminate\Support\Facades\Auth::user()->id) }}">here</a> to change yours. 😃
            </p>
        @else
            <section class="content">
            <div class="container-fluid col-md-8">
                <span class="checkbox float-right">
                    <input type="checkbox" id="showAllPassword" onclick="showHidePasswordChangePassword()">
                    <label for="showAllPassword"><small class="card-text">Show All Password</small></label>
                </span>
                <form method="POST" action="{{ route('updatePassword', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-4">
                        <label><i class="fas fa-key"></i> Old Password</label>
                        <div class="col-md-12">
                            <input id="oldPassword" type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" placeholder="Enter old password" value="{{old('oldPassword')}}">
                            @error('oldPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr class="mt-4">

                    <div class="form-group mt-4">
                        <label><i class="fas fa-key"></i> New Password</label>
                        <div class="col-md-12">
                            <input id="newPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password" value="{{old('password')}}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label><i class="fas fa-key"></i> Confirm Password</label>
                        <div class="col-md-12">
                            <input id="confirmPassword" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter confirm password"  value="{{old('password_confirmation')}}">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change Password') }}
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
