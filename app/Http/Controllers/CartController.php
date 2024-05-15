<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Charge;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function StoreCart(Request $request){
        $product = Product::find($request->product_id);

        if(Cart::where('product_id', $request->product_id)
                ->where('customer_id', Auth::guard('customer')->id())
                ->where('size_id', $request->size_id)
                ->where('color_id', $request->color_id)
                ->exists()) {

            Cart::where('product_id', $request->product_id)->where('customer_id', Auth::guard('customer')->id())->where('size_id', $request->size_id)->where('color_id', $request->color_id)->increment('quantity', $request->quantity);
            return response()->json(['message' => 'Product added to cart successfully'], Response::HTTP_OK);
        } else {
            $AddToCart = new Cart();
            $AddToCart->customer_id = Auth::guard('customer')->id();
            $AddToCart->product_id = $product->id;
            $AddToCart->color_id = $request->color_id;
            $AddToCart->size_id = $request->size_id;
            $AddToCart->quantity = $request->quantity;
            $AddToCart->created_at = Carbon::now();
            $AddToCart->save();

            return response()->json(['message' => 'Product added to cart successfully'], Response::HTTP_OK);
        }
    }


    function GetQuantityPrice(Request $request){
        $product = Product::find($request->product_id);
        $inventory = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->first();

        if ($inventory) {
            $quantity = $inventory->quantity;
            $price = '<span class="new-price">&#2547; '. $inventory->after_discount .'</span>';

            if($product->discount){
                $price .= '<span class="old-price"><del>&#2547; '. $inventory->price .'</del></span>
                <div class="Pro-lable">
                    <span class="p-discount">-'. $product->discount .'%</span>
                </div>';
            }

            return response()->json([
                'quantity' => $quantity,
                'price' => $price
            ]);
        } else {
            return response()->json([
                'error' => 'Inventory not found'
            ], 404);
        }
    }
    function GetColors(Request $request){
        $colors = Inventory::where('product_id', $request->product_id)->where('size_id', $request->size_id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();


        $string = '';
        foreach($colors as $index =>$color){
            if($color->Color->id == 1){
                $string .= '<a data-id='. $color->Color->id .' style="cursor: pointer; text-align: center; line-height: 24px;" class="active color_id"><span>'. $color->Color->color_name.'</span></a>';
            }else{
                $string .= '<a data-id='. $color->Color->id .' style="background: '. $color->Color->color_code .'; cursor: pointer;" class="color_id"><span></span></a>';
            }
        }
        return $string;
    }
    function CartPage(){
        $carts = Auth::guard('customer')->user()->Cart;
        $charges = Charge::all();
        return view('frontend.cart.cart_page', [
            'carts' => $carts,
            'charges'=> $charges
        ]);
    }
    function UpdateCartQuantity(Request $request){
        $cart = Cart::find($request->cart_id);
        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json(['message' => 'Cart Updated Successfully'], Response::HTTP_OK);
    }
    function CartDelete(Request $request){
        Cart::find($request->cart_id)->delete();
        return response()->json(['message' => 'Cart Deleted Successfully'], Response::HTTP_OK);
    }
    function GetCartCount(){
        $totalcarts = Auth::guard('customer')->user()->Cart->count();
        return $totalcarts;
    }
    function GetCoupon(Request $request){
        $coupon = Coupon::where('name', $request->coupon)->first();
       if($coupon){
        return response()->json([
            'coupon' => $coupon,
            'currentDate' => now(), // Send the current server-side date
        ]);
       }
       else{
        return response()->json(['message' => 'Coupon Does Not Exist'], Response::HTTP_OK);
       }


    }
}
