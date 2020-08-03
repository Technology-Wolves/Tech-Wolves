@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Your Favourites')
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
                        <h1 class="m-0 text-dark">Your favourite products</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid col-md-8">
                @if($favourites->isEmpty())
                    <p class="container mt-3 col-md-7 text-center bg-danger p-3">Currently you don't have any products. To add product click
                        <a href="{{ url('/addProduct') }}" style="color: #fffa90 !important; text-decoration: underline;"> here.</a></p>
                @else
                    <div class="row">
                        @foreach($favourites as $favourite)
                            <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex align-items-stretch">
                                <div class="card card-rad pt-4 mx-auto">
                                    <div class="image-holder">
                                        <img src="{{ asset('uploads/productImage') }}/{{$favourite->productImage}}" class="card-img-top pImg" alt="Product Image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$favourite->productName}}</h5>
                                        <p>
                                        <p class="card-text productDesc">{{$favourite->productDescription}}</p>

                                        <small class="form-text card-text productDesc">Original Price: <strong><strike>रू {{$favourite->orginalPrice}}</strike></strong> <span class="float-right"><strong>Dis. {{$favourite->discountRate}}%</strong></span></small>

                                        <small class="form-text card-text productDesc mb-4">Discounted Price: <strong>रू {{$favourite->discountedPrice}}</strong></small>

                                        <span class="clearfix">
                                            <a href="{{ url('/productDetails', $favourite->id)}}" class="btn btn-primary float-left"><i class="fas fa-angle-double-right"></i> See More</a>
                                            <a href="{{ url('/favourite',$favourite->fav_id) }}" class="btn btn-danger float-right" onclick="return confirm ('Are you sure you want to remove?');"><i class="fas fa-trash-alt"></i> Remove</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
