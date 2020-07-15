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
                <input class="form-control w-75" type="Search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger w-auto" type="submit">Search</button>
            </form>
            @foreach($products as $product)
                <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="card card-rad pt-4 mx-auto">
                        <img src="{{ asset('uploads/productImage') }}/{{$product->productImage}}" class="card-img-top pImg" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->productName}}</h5>
                            <p>
                            <p class="card-text productDesc">{{$product->productDescription}}</p>

                            <small class="form-text card-text productDesc flo">Original Price: <strong><strike>रू {{$product->orginalPrice}}</strike></strong> <span class="float-right"><strong>Dis. {{$product->discountRate}}%</strong></span></small>

                            <small class="form-text card-text productDesc mb-4">Discounted Price: <strong>रू {{$product->discountedPrice}}</strong></small>

                            <span class="clearfix">
                            <a href="{{ '/productDetails' }}/{{$product->id}}" class="btn btn-primary custom-btn float-left" style="border: none;">See More &raquo;</a>
                            <a href="{{ '/productDetails' }}/{{$product->id}}"><i class="fas fa-heart float-right heart-favourite"></i></a>
                        </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
