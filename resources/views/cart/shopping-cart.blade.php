@extends('layout')
@section('title', 'Cart Items')

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
            <h3 class="tittle-wthree text-center">Cart Items</h3>
        </div>
    </div>
    <div class="container mt-3 mb-3">
        @if(\Illuminate\Support\Facades\Session::has('cart'))
            <div class="table-responsive">
                <table class="table table-bordered table-striped ">
                    <thead>
                    <tr class="text-center">
                        <th colspan="9"><h2>Your Cart <i class="fab fa-opencart"></i></h2></th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">S.N</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Original Price</th>
                        <th scope="col">Discount Rate</th>
                        <th scope="col">Discounted Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Final Price</th>
                        <th scope="col">(Add or Remove quantity)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $number = 1; @endphp
                    @foreach($products as $product)
                        <tr class="text-center">
                            <th scope="row">{{$number++}}</th>
                            <td><img src="{{asset('uploads/productImage/' . $product['item']['productImage'])}}" style="height: 150px; width: auto;"></td>
                            <td><strong>{{$product['item']['productName']}}</strong></td>
                            <td><strong>रू. <strike>{{$product['item']['orginalPrice']}}</strike></strong></td>
                            <td><strong>{{$product['item']['discountRate']}} %</strong></td>
                            <td><strong>रू. {{$product['item']['discountedPrice']}}</strong></td>
                            <td><strong>{{$product['qty']}}</strong></td>
                            <td><strong>रू. {{$product['price']}}</strong></td>
                            <td>
                                <a class="btn btn-primary mb-1" href="{{ route( 'product.getIncrementByOne', ['id'=>$product['item']['id']]) }}"><i class="fas fa-plus"></i></a>
                                <a class="btn btn-secondary mb-1" href="{{ route( 'product.reduceByOne', ['id'=>$product['item']['id']]) }}"><i class="fas fa-minus"></i></a>
                                <a class="btn btn-danger mb-1" href="{{ route( 'product.remove', ['id'=>$product['item']['id']]) }}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="text-center">
                        <th scope="row">#</th>
                        <td colspan="6"><strong>Total Price: </strong></td>
                        <td><b>रू. {{$totalPrice}}</b></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div class="row-holder clearfix mb-3">
                    <div class="row float-right">
                        <div class="container">
                            <a href="{{ route('checkout') }}" class="btn btn-primary"><i class="fab fa-opencart"></i> Proceed Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <section class="content">
                <div class="container-fluid col-md-8">
                    <p class="container mt-3 col-md-7 text-center text-white bg-danger p-3">Currently you don't have any products in your cart. To add product click
                        <a href="{{ url('/products') }}" style="color: #fffa90 !important; text-decoration: underline;"> here.</a></p>
                </div>
            </section>
        @endif
    </div>
@endsection
