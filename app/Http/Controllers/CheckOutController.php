<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Charge;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShippingAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    function CheckOutPage(){
        $countries = Country::all();
        $carts = Auth::guard('customer')->user()->Cart;
        $shippingaddress = ShippingAddress::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.checkout.checkout', [
            'countries'=> $countries,
            'carts'=> $carts,
            'shippingaddress'=> $shippingaddress
        ]);
    }
    function StoreBilling(Request $request){
        $billingAddress = Auth::guard('customer')->user()->BillingAddress;
        if($billingAddress){
            $billingAddress->f_name = $request->f_name;
            $billingAddress->l_name = $request->l_name;
            $billingAddress->company = $request->company;
            $billingAddress->address = $request->address;
            $billingAddress->email = $request->email;
            $billingAddress->phone = $request->phone;
            $billingAddress->zip = $request->zip;
            $billingAddress->country_id = $request->country_id;
            $billingAddress->city_id = $request->city_id;
            $billingAddress->additional_info = $request->additional;
            $billingAddress->save();

            return response()->json(['message' => 'Billing Address Updated'], Response::HTTP_OK);
        }
        else{
            BillingAddress::insert([
                'customer_id'=> Auth::guard('customer')->id(),
                'f_name'=> $request->f_name,
                'l_name'=> $request->l_name,
                'company'=> $request->company,
                'address'=> $request->address,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'zip'=> $request->zip,
                'country_id'=> $request->country_id,
                'city_id'=> $request->city_id,
                'additional_info'=> $request->additional,
                'created_at'=> Carbon::now()
            ]);
            return response()->json(['message' => 'Billing Address Added'], Response::HTTP_OK);
        }
    }

    function StoreShipping(Request $request){
        ShippingAddress::insert([
            'customer_id'=> Auth::guard('customer')->id(),
            'f_name'=> $request->f_name,
            'l_name'=> $request->l_name,
            'company'=> $request->company,
            'address'=> $request->address,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'zip'=> $request->zip,
            'country_id'=> $request->country_id,
            'city_id'=> $request->city_id,
            'additional_info'=> $request->additional,
            'created_at'=> Carbon::now()
        ]);
        return response()->json(['message' => 'Shipping Address Added'], Response::HTTP_OK);
    }
    function GetShippingAddress(Request $request){
        $shippingaddress = Auth::guard('customer')->user()->ShippingAddress;

        return response()->json(['shippingaddress' => $shippingaddress], Response::HTTP_OK);
    }
    function DeleteShipping(Request $request){
        ShippingAddress::find($request->shipping_id)->delete();
        return response()->json(['message' => 'Shipping Address Deleted'], Response::HTTP_OK);
    }
    function GetShippingDetails(Request $request){
        $details = ShippingAddress::find($request->shipping_id);
        return $details;
    }
    function StoreOrder(Request $request){
        $billingaddress = Auth::guard('customer')->user()->BillingAddress;
        $order_id = '1010'. random_int(000000, 999999);
        $coupon = '';
        $discount = 0;
        if($request->coupon_id != ''){
            $coupon = Coupon::find($request->coupon_id);
            if($coupon->type == 0){
                $discount = ($request->sub_total * $coupon->amount) / 100;
            }
            else{
                $discount = $coupon->amount;
            }
        }
        if($request->payment_type == 1){
            Order::insert([
                'order_id'=> $order_id,
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub_total,
                'discount'=> $discount,
                'charge'=> $request->charge,
                'billing_id'=> $billingaddress->id,
                'shipping_id'=> $request->shipping_id,
                'payment_type'=> $request->payment_type,
                'created_at'=> Carbon::now(),
            ]);


            $carts = Auth::guard('customer')->user()->Cart;
            foreach($carts as $cart){
                $InventoryItem = $cart->Product->Inventory->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first();
                OrderProduct::insert([
                    'order_id'=> $order_id,
                    'customer_id'=> Auth::guard('customer')->id(),
                    'product_id'=> $cart->product_id,
                    'color_id'=> $cart->color_id,
                    'size_id'=> $cart->size_id,
                    'quantity'=> $cart->quantity,
                    'price'=> $InventoryItem->after_discount,
                    'created_at'=> Carbon::now()
                ]);
                $InventoryItem->decrement('quantity', $cart->quantity);
                $cart->delete();
            }

            // // // Sending Invoice Mail

            Mail::to($billingaddress->email)->send(new InvoiceMail($order_id));



            // SMS
            // $url = "http://bulksmsbd.net/api/smsapi";
            // $api_key = "x6nwYLhKPEvYcIRwzCeL";
            // $senderid = "8809617618226";
            // $number = $billingaddress->phone;
            // $message = "Your Ecommerce Order has been placed. Order Id : #$order_id . You will get your parcel soon... please keep your total payment amount TK ".($request->sub_total - $discount)+ $request->charge ."--/";

            // $data = [
            //     "api_key" => $api_key,
            //     "senderid" => $senderid,
            //     "number" => $number,
            //     "message" => $message
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // $response = curl_exec($ch);
            // curl_close($ch);

            return response()->json(['message' => 'Order Added', 'order_id'=> $order_id], Response::HTTP_OK);
        }
        elseif($request->payment_type == 2){
            $data = [
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub_total,
                'discount'=> $discount,
                'charge'=> $request->charge,
                'billing_id'=> $billingaddress->id,
                'shipping_id'=> $request->shipping_id,
                'created_at'=> Carbon::now(),
            ];
            return $data;
        }
        elseif($request->payment_type == 3){
            $data = [
                'customer_id'=> Auth::guard('customer')->id(),
                'total'=> $request->sub_total,
                'discount'=> $discount,
                'charge'=> $request->charge,
                'billing_id'=> $billingaddress->id,
                'shipping_id'=> $request->shipping_id,
                'created_at'=> Carbon::now(),
            ];
            return $data;
        }
    }
    function SSLOrder(Request $request){
        $billingaddress = Auth::guard('customer')->user()->BillingAddress;
        $coupon = '';
        $discount = 0;
        if($request->coupon_id != ''){
            $coupon = Coupon::find($request->coupon_id);
            if($coupon->type == 0){
                $discount = ($request->sub_total * $coupon->amount) / 100;
            }
            else{
                $discount = $coupon->amount;
            }
        }
        $data = [
            'customer_id'=> Auth::guard('customer')->id(),
            'total'=> $request->sub_total,
            'discount'=> $discount,
            'charge'=> $request->charge,
            'billing_id'=> $billingaddress->id,
            'shipping_id'=> $request->shipping_id,
            'created_at'=> Carbon::now(),
        ];
        return redirect('/pay')->with('data', $data);
    }
    function OrderSuccess($order_id){
        $orderId = Order::where('order_id', $order_id)->first();
        return view('frontend.checkout.order_success', [
            'orderId'=> $orderId
        ]);
    }
    function TrackingOrder($order_id){
        $orderId = Order::where('order_id', $order_id)->first();
        return view('frontend.checkout.tracking_orders', [
            'orderId'=> $orderId
        ]);
    }
    function CancelOrder(Request $request){
        $order = Order::find($request->id);
        $order->status = 0;
        $order->save();
        return response()->json(['message' => 'Order Cancelled'], Response::HTTP_OK);
    }
}
