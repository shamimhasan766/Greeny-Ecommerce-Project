<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function OrderList(){
        $orders = Order::latest()->get();
        return view('admin.orders.order_list', [
            'orders' => $orders
        ]);
    }
    function OrderStatusChange(Request $request, $id){
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return back();
    }
    function OrderDetailsView($id){
        $order = Order::find($id);
        return view('admin.orders.order_details', [
            'order'=> $order
        ]);
    }
}
