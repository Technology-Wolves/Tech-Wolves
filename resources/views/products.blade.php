@extends('layout')
@section('title', 'Products')

@section('main-section')
    <div class="inner-register">
        <div class="overlay-inner">
            <h3 class="tittle-wthree text-center">Products</h3>
        </div>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row">
            <form class="form-inline my-2 mb-4 w-100 search-form">
                
            <div class="w-10" style="">
                <select class="form-control @error('categories') is-invalid @enderror" name="categories" value="{{ old('categories')}} " autocomplete="categories" autofocus>
                    <option selected value="">Select Category</option>
                    <option value="laptop">Laptop</option>
                    <option value="pc">PC</option>
                    <option value="drives">Drives</option>
                    <option value="others">Others</option>
                </select>
            </div>

                <input class="form-control w-50 ml-1" type="Search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger w-auto" type="submit">Search <i class="fas fa-search"></i></button>
            </form>
            @if($products->isEmpty())
                <p class="container mt-3 col-md-7 text-center bg-danger p-3" style="color: #fffa90 !important;">Sorry, No products found.
                    <br>Wait for seller to upload their products. 😊</p>
            @else
            @foreach($products as $product)
                <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="card card-rad pt-4 mx-auto">
                        <div class="image-holder">
                            <img src="{{ asset('uploads/productImage') }}/{{$product->productImage}}" class="card-img-top pImg" alt="Product Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->productName}}</h5>
                            <p>
                            <p class="card-text productDesc">{{$product->productDescription}}</p>

                            <small class="form-text card-text productDesc">Original Price: <strong><strike>रू {{$product->orginalPrice}}</strike></strong> <span class="float-right"><strong>Dis. {{$product->discountRate}}%</strong></span></small>

                            <small class="form-text card-text productDesc mb-4">Discounted Price: <strong>रू {{$product->discountedPrice}}</strong></small>

                            <span>
                                Seller: {{ $product->productOwner->name }}
                            </span>
                            <span class="clearfix">
                                <a href="{{ url('/product', $product->id)}}{{__('/details')}}" class="btn btn-primary custom-btn float-left" style="border: none;">See More &raquo;</a>
                                <a href="{{$product->id}}"><i class="fas fa-heart float-right heart-favourite"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
