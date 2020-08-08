@extends('layouts.dashboard.dashboardLayout')
@section('title', 'All Subscribers')
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
                        <h1 class="m-0 text-dark title-text">All Subscribers</h1>
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
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>saugat@gmail.com</td>
                                <td>
                                    <a class="btn btn-primary" href="mailto: saugat@gmail.com?subject=Hello from the techwolves."><i class="fas fa-envelope"></i></a>
                                    <a class="btn btn-danger" href="#" onclick="return confirm ('Are you sure you want to delete user named?');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>devish@gmail.com</td>
                                <td>
                                    <a class="btn btn-primary" href="mailto: devish@gmail.com?subject=Hello from the techwolves."><i class="fas fa-envelope"></i></a>
                                    <a class="btn btn-danger" href="#" onclick="return confirm ('Are you sure you want to delete user named?');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>anish@gmail.com</td>
                                <td>
                                    <a class="btn btn-primary" href="mailto: anish@gmail.com?subject=Hello from the techwolves."><i class="fas fa-envelope"></i></a>
                                    <a class="btn btn-danger" href="#" onclick="return confirm ('Are you sure you want to delete user named?');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
