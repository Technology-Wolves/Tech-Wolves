@extends('layouts.dashboard.dashboardLayout')
@section('title', 'All Users')
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
            <div class="container-fluid col-md-8 mt-3">
                <div class="row mb-2">
                    <div class="col-sm-12 clearfix">
                        <h1 class="m-0 text-dark title-text">All Users</h1>
                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3 title-form" type="GET" action="{{ url('/userSearch') }}">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="search" name="query" placeholder="Search User" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid col-md-9">
                <div class="row">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Registration Type</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $number = 1; @endphp
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$number++}}</th>
                            <td><img src="{{asset('/uploads/profileImage'). '/' . $user->profileImage}}" alt="{{$user->name}}" style="width: 50px; height: 50px; background-color: #0c5460"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->regType}}</td>
                            <td>
                                <a class="btn btn-primary" href="mailto: {{$user->email}}?subject=Hello from the techwolves."><i class="fas fa-envelope"></i></a>
                                <a class="btn btn-danger" href="{{ route('deleteUser', $user->id) }}" onclick="return confirm ('Are you sure you want to delete user named \'{{$user->name}}\' ?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--Pagination Begins--}}
                    <div class="paginations">
                        {{ $users->links() }}
                    </div>
                    {{--Pagination Ends--}}
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
