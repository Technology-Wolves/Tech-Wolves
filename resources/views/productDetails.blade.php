@extends('layout')
@section('title', 'Product Details')

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
            <h3 class="tittle-wthree text-center">Product Details</h3>
        </div>
    </div>
    <div class="cart">
        <a href="{{ route('product.shoppingCart') }}">
            <i class="fas fa-shopping-cart total-cart"></i>
            <span class="badge badge-danger product-items-count">{{ \Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty : '' }}</span>
        </a>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row product-details-holder">
            <div class="col-lg-6 mb-4 d-flex align-items-stretch">
                <div class="productImage card mx-auto">
                    <img src="{{asset('/uploads/productImage/')}}/{{ $product->productImage }}" alt="Product Image">
                </div>
            </div>
            <div class="col-lg-6 mb-4 d-flex align-items-stretch text-center product-details-right" style="padding-left: 20px">
                <div class="product-detail-info">
                    <h3 class="product-name">{{$product->productName}}</h3><br>
                    <p class="product-details text-justify">{{$product->productDescription}}</p>
                    <p class="product-price">
                        <span class="product-discounted-price"><strong>रू. {{$product->discountedPrice}}</strong></span>
                        <span class="product-original-price text-secondary"><strike>रू. {{$product->orginalPrice}}</strike></span>
                        <span class="product-discounted-rate"><small class="form-text badge badge-dark">-{{$product->discountRate}}%</small></span>
                    </p>
                    <p>Category: <span class="product-seller text-uppercase">{{$product->categories}}</span></p>
                    <p class="product-seller"><strong>Seller: {{$product->productOwner->name}}</strong></p>
                    <div class="product-button">
                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-secondary "><i class="fas fa-cart-plus add-to-cart text-white"></i> Add to Cart</a>
                        <a href="{{ url('/favourite', $product->id) }}" class="btn btn-secondary"><i class="fas fa-heart heart-favourite text-danger"></i> Favourite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
