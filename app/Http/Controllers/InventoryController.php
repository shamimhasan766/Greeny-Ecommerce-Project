<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function Inventory($id){
        $product = Product::find($id);
        $inventories = $product->Inventory;
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.Inventory.inventory',[
            'inventories'=> $inventories,
            'product'=> $product,
            'colors'=> $colors,
            'sizes'=> $sizes,
        ]);
    }
    function InventoryStore(Request $request, $id){
        $request->validate([
            'quantity'=> 'required|numeric',
            'price'=> 'required|numeric'
        ]);
        if (Inventory::Where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()) {
            Inventory::Where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
            return back()->withSuccess('Inventory Updated Successfully');
        }
        else{
        $product = Product::find($id);
        $after_discount = $request->price - $request->price / 100 * ($product->discount);
        Inventory::insert([
            'product_id'=> $id,
            'color_id'=> $request->color_id,
            'size_id'=> $request->size_id,
            'quantity'=>$request->quantity,
            'price'=> $request->price,
            'after_discount'=>$after_discount,
            'created_at'=> Carbon::now()
        ]);

        return back()->withSuccess('Inventory Added Successfully');
        }
    }
    function InventoryDelete($id){
        Inventory::find($id)->delete();
        return back()->withDelete('Inventory Deleted Successfully');
    }
}
