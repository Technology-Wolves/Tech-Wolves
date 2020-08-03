@extends('layouts.dashboard.dashboardLayout')
@section('title', 'View Orders')
@section('main-section')
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            opacity: 0;
            width: 220px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 3px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 0px;
            left: -30px;
            margin-left: -200px;
            transition: all 0.5s ease-in;
        }

        .tooltip:hover .tooltiptext {
            opacity: 1;
        }

        .tooltiptext:after {
            content: "";
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 6px 0 6px 10px;
            border-color: transparent transparent transparent #000;
            position: absolute;
            left: 100%;
            bottom: 10px;
        }
    </style>
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
                                            <strong class="text-capitalize">
                                                @if($order->status === 'processing')
                                                    <p class="badge badge-warning bg-orange" style="color: #fff !important;">{{$order->status}}</p>
                                                @endif
                                                @if($order->status === 'order confirmed')
                                                    <p class="badge badge-info">Order Confirmed</p>
                                                @endif
                                                @if($order->status === 'shipped')
                                                    <p class="badge badge-secondary">Shipped</p>
                                                @endif
                                                @if($order->status === 'delivered')
                                                    <p class="badge badge-success">Delivered</p>
                                                @endif
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
                                        @if($order->status ==  'order confirmed' || $order->status == 'shipped')
                                            <th scope="row" colspan="10">
                                                <div class="tooltip-wrapper">
                                                    <button class="btn btn-danger float-right tooltip" style="border: none;" disabled="disabled">
                                                        <i class="fas fa-times"></i>&nbsp;&nbsp;Cancel Order</a>
                                                        <span class="tooltiptext">Cannot cancel your order now.</span>
                                                    </button>
                                                </div>
                                            </th>
                                        @elseif($order->status == 'delivered')
                                            <th scope="row" colspan="10">
                                                <a href="{{$order->id}}" class="btn btn-success float-right" style="border: none;"><i class="fas fa-receipt"></i>&nbsp;&nbsp;View Bill</a>
                                            </th>
                                        @else
                                            <th scope="row" colspan="10">
                                                <a href="{{$order->id}}" class="btn btn-danger float-right" style="border: none;" onclick="return confirm ('Are you sure you want to delete?');"><i class="fas fa-times"></i>&nbsp;&nbsp;Cancel Order</a>
                                            </th>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                        @empty($order)
                            <p class="container mt-3 col-md-7 text-center bg-danger p-3" style="color: #fffa90 !important;">Sorry, no any orders found.
                                <br>Please order any of our products to see in this section.</p>
                        @endempty
                    </div>
                </div>
            </div>
        </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
