@extends('layout')
@section('title', 'Products')

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
            <h3 class="tittle-wthree text-center">Products</h3>
        </div>
    </div>
    <div class="cart">
        <a href="{{ route('product.shoppingCart') }}">
            <i class="fas fa-shopping-cart total-cart"></i>
            <span class="badge badge-danger product-items-count">{{ \Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty : '' }}</span>
        </a>
    </div>
    <div class="container mt-3 mb-5">
        <div class="row">
            <form class="form-inline my-2 mb-4 w-100 search-form" action="{{url('/searchProduct')}}">
                <select class="form-control search-categories"  name="categories">
                    <option selected value="">Select Category</option>
                    <option value="laptop">Laptop</option>
                    <option value="pc">PC</option>
                    <option value="drives">Drives</option>
                    <option value="others">Others</option>
                </select>
                <input class="form-control w-50 ml-1" name="query" type="Search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger w-auto" type="submit">Search <i class="fas fa-search"></i></button>
            </form>
            @if($products->isEmpty())
                <p class="container mt-3 col-md-7 text-center bg-danger p-3" style="color: #fffa90 !important;">Sorry, No products found.
                    <br>Wait for seller to upload their products. 😊</p>
            @else
            @foreach($products as $product)
                <div class=" col-md-6 col-md-3 col-lg-3 d-flex align-items-stretch mb-4">
                    <div class="card card-rad pt-4 mx-auto card-product">
                        <div class="image-holder">
                            <img src="{{ asset('uploads/productImage') }}/{{$product->productImage}}" class="card-img-top pImg" alt="Product Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ \Illuminate\Support\Str::limit($product->productName, 50)  }}</h5>
                            <p>
                            <p class="card-text productDesc">{{$product->productDescription}}</p>

                            <small class="form-text card-text productDesc">Original Price: <strong><strike>रू {{$product->orginalPrice}}</strike></strong> <span class="float-right"><strong>Dis. {{$product->discountRate}}%</strong></span></small>

                            <small class="form-text card-text productDesc mb-4">Discounted Price: <strong>रू {{$product->discountedPrice}}</strong></small>

                            <p class="text-center">
                                <strong>Seller: </strong>{{ \Illuminate\Support\Str::limit($product->productOwner->name, 10) }}
                            </p>
                            <div class="product-button-holders">
                                <a href="{{ url('/productDetails')}}/{{$product->id}}/{{$product->id}}" class="btn btn-primary custom-btn" style="border: none;">See More &raquo;</a>
                                <a href="{{ route('product.addToCart', $product->id) }}"><i class="fas fa-cart-plus add-to-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            <div class="paginations">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
