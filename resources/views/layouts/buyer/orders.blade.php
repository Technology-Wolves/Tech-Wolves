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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid col-md-8">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">Orders</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->

        <section class="content">
            <div class="container-fluid col-md-8">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @foreach($orders as $order)
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        @foreach($order->cart->items as $item)
                                        <li class="list-group-item">
                                            <span class="badge badge-primary">{{ $item['price'] }}</span>
                                            {{ $item['item']['productName'] }} | {{ $item['qty'] }} Units
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <strong>
                                        Total Price: ${{ $order->cart->totalPrice }}
                                    </strong>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
