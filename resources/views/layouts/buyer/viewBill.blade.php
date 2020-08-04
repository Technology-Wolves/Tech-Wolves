@extends('layouts.dashboard.dashboardLayout')
@section('title', 'Print Bill')
@section('main-section')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container col-md-8">
                <div class="row">
                   <div id="bill" class="bill mt-5">
                       <div class="col-md-12 col-md-offset-2">
                           @foreach($orders as $order)
                               <h4 class="text-center">Your Bill</h4>
                               <div class="infos">
                                   <p>Name: {{$order->name}}</p>
                                   <p>Email: {{$order->email}}</p>
                                   <p>Contact: {{$order->phone}}</p>
                                   <p>Address: {{$order->address}}</p>
                                   <p>Ordered Date: {{$order->created_at->toDateString()}}</p>
                                   <p>Ordered Time: {{$order->created_at->toTimeString()}}</p>
                                   <p>Payment Type: {{$order->paymentType}} (eSewa/Khalti/PrabhuPay)</p>
                               </div>
                               <table class="table table-striped table-responsive" style="margin: 30px 0">
                                   <thead>
                                   <tr class="text-center">
                                       <th scope="col">S.N</th>
                                       <th scope="col">Product Image</th>
                                       <th scope="col">Product Name</th>
                                       <th scope="col">Original Price</th>
                                       <th scope="col">Discount Rate</th>
                                       <th scope="col">Discounted Price</th>
                                       <th scope="col">Quantity</th>
                                       <th scope="col">Final Price</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php $number = 1; @endphp
                                   @foreach($order->cart->items as $item)
                                       <tr class="text-center">
                                           <th scope="row">{{$number++}}</th>
                                           <td><img src="{{asset('uploads/productImage/' . $item['item']['productImage'])}}" style="height: 150px; width: auto;"></td>
                                           <td><strong>{{$item['item']['productName']}}</strong></td>
                                           <td><strong>रू. <strike>{{$item['item']['orginalPrice']}}</strike></strong></td>
                                           <td><strong>{{$item['item']['discountRate']}} %</strong></td>
                                           <td><strong>रू. {{$item['item']['discountedPrice']}}</strong></td>
                                           <td><strong>{{ $item['qty'] }} {{ $item['qty'] === 1 ? 'Unit' : 'Units' }}</strong></td>
                                           <td><strong>रू. {{$item['price']}}</strong></td>
                                       </tr>
                                   @endforeach
                                   <tr>
                                       <th scope="row">#</th>
                                       <td colspan="6"><strong>Total Price: </strong></td>
                                       <td class="text-center"><b> रू. {{ $order->cart->totalPrice }}</b></td>
                                   </tr>
                                   </tbody>
                               </table>
                           @endforeach
                       </div>
                   </div>
                    <p class="w-100">
                        <button class="btn btn-success mb-4 float-right"  onclick="printContent('bill');"><i class="fas fa-receipt"></i>&nbsp;&nbsp;Print Bill</button>
                    </p>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function printContent(el){
            const restorepage = $('body').html();
            const printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
        }
    </script>
@endsection
