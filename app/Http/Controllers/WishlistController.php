<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function StoreWishlist(Request $request){
        $product = Product::where('slug', $request->slug)->first();
        $customer_id = Auth::guard('customer')->id();

        $exists = WishList::where('product_id', $product->id)->where('customer_id', $customer_id)->exists();

        if($exists){
            WishList::where('product_id', $product->id)->where('customer_id', $customer_id)->delete();

            return response()->json(['message' => 'Product Deleted From WishList'], Response::HTTP_OK);
        }
        else{
            WishList::insert([
                'customer_id'=> $customer_id,
                'product_id'=> $product->id,
                'created_at'=> Carbon::now()
            ]);

            return response()->json(['message' => 'Product Added To WishList'], Response::HTTP_OK);
        }
    }

    function Wishlist(){
        $products = Auth::guard('customer')->user()->wishlists;
        return view('frontend.wishlist.wishlists',[
            'products'=> $products
        ]);
    }
}
