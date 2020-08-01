<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function getOrders(){
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('layouts.buyer.orders', compact('orders'));
    }
    public function getAllOrder(){
        $order = Order::paginate(1);
        $order->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('layouts.admin.viewOrders',[
            'orders'=>$order
        ]);
    }
    public function updateOrder(Request $request, $orderId){
        $request->validate([
           'status'=> 'required'
        ]);

        $order = Order::find($orderId);
        $order->status = $request->status;
        $page = $request->current_page;

        $order->save();
        Session::flash('success-message', 'Order Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/getAllOrders?page='.$page);
    }
}
