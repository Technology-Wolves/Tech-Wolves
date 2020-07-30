@extends('layouts.dashboard.dashboardLayout')
@section('title', 'View Orders')
@section('main-section')
    @if(Session::has('success-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-check-circle"></i> {{ Session::get('success-message') }}</p>
    @endif

    @if(Session::has('error-message'))
        <p class="container mt-3 alert col-md-7 text-center {{ Session::get('alert-class', 'alert-info') }}"><i class="fas fa-times-circle"></i> {{ Session::get('error-message') }}</p>
    @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container col-md-8">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        @foreach($orders as $order)
                            <table class="table table-bordered table-striped table-responsive" style="margin: 30px 0 60px;">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="9"><h2>Your Orders <i class="fab fa-opencart"></i></h2></th>
                                </tr>
                                <tr class="text-center">
                                    <th scope="col">S.N</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col">Original Price</th>
                                    <th scope="col">Discount Rate</th>
                                    <th scope="col">Discounted Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Final Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $number = 1; @endphp
                                    @foreach($order->cart->items as $item)
                                    <tr class="text-center">
                                        <th scope="row">{{$number++}}</th>
                                        <td><img src="{{asset('uploads/productImage/' . $item['item']['productImage'])}}" style="height: 150px; width: auto;"></td>
                                        <td><strong>{{$item['item']['productName']}}</strong></td>
                                        <td><strong>{{$item['item']->productOwner->name}}</strong></td>
                                        <td><strong>रू. <strike>{{$item['item']['orginalPrice']}}</strike></strong></td>
                                        <td><strong>{{$item['item']['discountRate']}} %</strong></td>
                                        <td><strong>रू. {{$item['item']['discountedPrice']}}</strong></td>
                                        <td><strong>{{ $item['qty'] }} {{ $item['qty'] === 1 ? 'Unit' : 'Units' }}</strong></td>
                                        <td><strong>रू. {{$item['price']}}</strong></td>
                                        <td>
                                            <strong>
                                                <span class="badge badge-warning bg-orange" style="color: #fff !important;">Processing</span><br>
                                                <span class="badge badge-info">Order Confirmed</span><br>
                                                <span class="badge badge-secondary">Shipped</span><br>
                                                <span class="badge badge-success">Delivered</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="text-center">
                                        <th scope="row">#</th>
                                        <td colspan="7"><strong>Total Price: </strong></td>
                                        <td><b> रू. {{ $order->cart->totalPrice }}</b></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="10">
                                            <a href="{{$order->id}}" class="btn btn-danger float-right" style="border: none;" onclick="return confirm ('Are you sure you want to delete?');"><i class="fas fa-trash-alt"></i> Cancel Order</a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
