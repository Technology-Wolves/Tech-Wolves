@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Approve Orders')
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
                                    <th colspan="8"><h2>Approve Orders <i class="fab fa-opencart"></i></h2></th>
                                </tr>
                                <tr class="text-center">
                                    <th scope="col">S.N</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Final Price</th>
                                    <th scope="col">Current Status</th>
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
                                        <td><strong>{{$order->name}}</strong></td>
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
                                    <td colspan="5"><strong>Total Price: </strong></td>
                                    <td><b> रू. {{ $order->cart->totalPrice }}</b></td>
                                    <td></td>
                                </tr>
                                <form method="POST" action="{{ url('/updateOrder') }}/{{$order->id}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <th scope="row" colspan="1"></th>
                                        <th scope="row" colspan="1">Change Order Status: </th>
                                        <th scope="row" colspan="3">
                                            <select class="form-control text-capitalize" name="status">
                                                <option selected value="{{$order->status}}">Select Aprove Status</option>
                                                <option value="processing">Processing</option>
                                                <option value="order confirmed">Order Confirmed</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                            </select>
                                            <input type="hidden" name="current_page" value="{{$orders->currentPage()}}">
                                        </th>
                                        <th scope="row" colspan="3">
                                            <div class="tooltip-wrapper">
                                                <button class="btn btn-primary float-right" style="border: none;" >
                                                    <i class="fas fa-check"></i>&nbsp;&nbsp;Approve Order
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                            {{--Pagination Begins--}}
                            <div class="paginations">
                                {{ $orders->links() }}
                            </div>
                            {{--Pagination Ends--}}
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
