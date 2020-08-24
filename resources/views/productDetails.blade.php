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
    @foreach($product as $product)
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
    @endforeach

    <div class="product-comment pt-5 pb-5" style="background-color: #ececec;">
        <h3 class="text-center text-capitalize pb-3" style="border-bottom: 2px solid #ddd;">Write a review and give us a rating...</h3>
        <div class="container mt-3 mb-2 clearfix">
            <form action="{{ url('/postRatings') }}" method="POST">
                @csrf
                <div class="form-group float-left col-lg-9  col-sm-12">
                    <i class="fas fa-comments"></i>
                    <label for="comment">Your honest comment.</label>
                    <textarea style="border-radius: 0;" class="form-control @error('comment') is-invalid @enderror" id="comment" rows="4" placeholder="Leave a comment." name="comment">{{ old('comment') }}</textarea>
                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group float-right col-lg-3 col-sm-12">
                    <i class="fas fa-star"></i>
                    <label for="rating-stars">Product Star Rating</label>
                    <select class="form-control text-center mb-3  @error('stars') is-invalid @enderror" id="rating-stars" name="stars" style="margin: 10px 0; border-radius: 0;">
                        <option value=" ">Select Stars for rating</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                    <button class="btn btn-primary  col-lg-12" type="submit" style="border-radius: 0;">Submit <i class="far fa-paper-plane"></i></button>
                    @error('stars')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="hidden" name="productId" value="{{$product->id}}">
                </div>
            </form>
        </div>
    </div>

    <div class="product-comment pt-3 pb-1">
        <h3 class="text-center text-capitalize pt-3 pb-3">Product feedbacks and reviews</h3>
        @if($ratings->isEmpty())
            <p class="container mt-3 col-md-7 text-center bg-danger p-3 text-light">No any reviews. Be the first one to review this product.</p>
        @else
            @foreach($ratings as $rating)
            <div class="container mt-3 mb-2 clearfix">
                <img class="float-left rating-profile-image" src="{{asset('uploads/profileImage/')}}/{{$rating->userImage}}" alt="Profile Image">
                @if(Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->id === $rating->userId)
                        <a href="{{ url('/deleteReview') }}/{{$product->id}}/{{$rating->r_id}}" onclick="return confirm ('Are you sure you want to delete your review?');"><i class="fas fa-trash-alt float-right del-review" style="color: #949494; margin: 0px 20px 0px 0;"></i></a>
                    @endif
                @endif
                <span class="form-text"><strong>{{$rating->userName}}</strong>&nbsp;&nbsp;<span class="text-secondary rating-profile-email">({{$rating->userEmail}})</span></span>
                <span class="float-left" style="font-size: 24px;">
                    @for($i = 1; $i<= $rating->stars; $i++)
                        <img src="{{ asset('/images/star.png') }}" height="25px" width="25px">
                    @endfor
                </span><br><br>
                <p class="text-justify">{{ $rating->comment }}</p>
                <hr>
            </div>
            @endforeach
        @endif
    </div>
@endsection
