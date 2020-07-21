@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Add Product')
@section('main-section')
    @if(Session::has('message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-check-circle"></i> {{ Session::get('message') }}</p>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid col-md-8">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">Add Product</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid col-md-8">
                <form method="POST" action="{{ route('addProduct') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-4">
                        <label><i class="fas fa-box"></i> {{ __('Product Name') }}</label>
                        <div class="col-md-12">
                            <input id="productName" type="text" class="form-control name @error('productName') is-invalid @enderror" name="productName" value="{{ old('productName') }}" autocomplete="productName" autofocus>
                            @error('productName')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label><i class="fas fa-align-justify"></i> {{ __('Product Description') }}</label>
                        <div class="col-md-12"><textarea class="form-control @error('productDescription') is-invalid @enderror" name="productDescription" id="productDescription" cols="20" rows="5">{{ old('productDescription') }}</textarea>
                            @error('productDescription')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4 clearfix">
                        <div class="float-left col-md-10 col-8">
                            <label><i class="fas fa-dollar-sign"></i> {{ __(' Original Price') }}</label>
                            <div class="col-md-12">
                                <input id="orginalPrice" type="number" class="form-control telephone @error('orginalPrice') is-invalid @enderror" name="orginalPrice" value="{{ old('orginalPrice') }}" autocomplete="orginalPrice" autofocus>

                                @error('orginalPrice')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="float-left  col-md-2 col-4">
                            <label><i class="fas fa-percentage"></i> {{ __(' Discount') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="number" class="form-control telephone @error('discountRate') is-invalid @enderror" name="discountRate" value="{{ old('discountRate') }}" autocomplete="discountRate" autofocus>

                                @error('discountRate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label><i class="fas fa-tags"></i> {{ __(' Categories:') }} </label>
                        <div class="col-md-12">
                            <select class="form-control @error('categories') is-invalid @enderror" name="categories" value="{{ old('categories')}} " autocomplete="categories" autofocus>
                                <option selected value="">Select Category</option>
                                <option value="laptop">Laptop</option>
                                <option value="pc">PC</option>
                                <option value="drives">Drives</option>
                                <option value="others">Others</option>
                            </select>
                            @error('categories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-4 mb-4 custom-file">
                        <label for="profileImage"><i class="far fa-images"></i></i> {{ __(' Choose Product Image') }}</label><br>
                        <div class="col-md-12">
                            <input type="file" class="mb-4  @error('productImage') is-invalid @enderror" id="productImage" name="productImage">
                            @error('productImage')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Product') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
