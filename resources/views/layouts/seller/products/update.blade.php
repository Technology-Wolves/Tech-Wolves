@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Update Product')
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
                        <h1 class="m-0 text-dark">Update Product</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
{{--        <?php--}}
{{--        echo $_GET['product_id'];--}}
{{--        ?>--}}
{{--        <p>{{ $product->id }}</p>--}}
        @if($_GET['product_id'] == $product->id)
            <section class="content">
                <div class="container-fluid col-md-8">
                    <form method="POST" action="{{ route('updateProduct', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-4">
                            <label><i class="fas fa-box"></i> {{ __('Product Name') }}</label>
                            <div class="col-md-12">
                                <input id="productName" type="text" class="form-control name @error('productName') is-invalid @enderror" name="productName" value="{{ $product->productName }}" autocomplete="productName" autofocus>
                                @error('productName')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label><i class="fas fa-align-justify"></i> {{ __('Product Description') }}</label>
                            <div class="col-md-12"><textarea class="form-control @error('productDescription') is-invalid @enderror" name="productDescription" id="productDescription" cols="20" rows="5">{{ $product->productDescription }}</textarea>
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
                                    <input id="orginalPrice" type="number" class="form-control telephone @error('orginalPrice') is-invalid @enderror" name="orginalPrice" value="{{ $product->orginalPrice }}" autocomplete="orginalPrice" autofocus>

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
                                    <input id="name" type="number" class="form-control telephone @error('discountRate') is-invalid @enderror" name="discountRate" value="{{ $product->discountRate }}" autocomplete="discountRate" autofocus>

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
                                <select class="form-control @error('categories') is-invalid @enderror" name="categories" autocomplete="categories" autofocus>
                                    <option selected value="{{ $product->categories }}">{{$product->categories}}</option>
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
                                {{$product->productImage}}
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
                                    {{ __('Update Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.container-fluid -->
            </section>
        @else
            <p class="container mt-3 col-md-7 text-center form-control alert-danger"><i class="fas fa-times-circle"></i> Sorry, you cannot edit other's product.
                Click <a class="text-warning" href="{{ url('/addedProducts') }}">here</a> to edit yours. 😃
            </p>
        @endif
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
