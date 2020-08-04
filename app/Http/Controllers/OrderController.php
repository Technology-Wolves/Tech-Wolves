<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function shortStatusPage(){
        $order = Order::get();
        $order->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('layouts.admin.shortOrderStatus', compact('order'));
    }

    public function shortStatus(Request $request){
        $status = $request->status;
        $order = Order::where('status', $status)->get();
        $order->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

//        dd($order);
        return view('layouts.admin.shortOrderResult',[
            'orders'=>$order
        ]);
    }

    public function cancelOrder($orderId){
        Order::destroy($orderId);
        Session::flash('success-message', 'Order Cancelled!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/viewOrders');
    }

    public function viewBill($id){
        $orders = Order::where('id', $id)->get();
//        dd($orders);
        $orders->transform(function ($orders, $key){
            $orders->cart = unserialize($orders->cart);
            return $orders;
        });
        return view('layouts.buyer.viewBill', ['orders'=>$orders]);
    }
}
