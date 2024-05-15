<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Index(){
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $newProduct = Product::orderBy('created_at', 'desc')->get();


        return view('frontend.index',[
            'categories'=> $categories,
            'products'=> $products,
            'newproducts'=> $newProduct,
        ]);
    }
    function GetProductDetails(Request $request){
        $product = Product::find($request->product_id);
        $galleries = $product->Gallery;
        $data = [
            'product' => $product,
            'galleries' => $galleries,
        ];

        // Return the data in JSON format
        return response()->json($data);
    }
    function CategoryProduct($slug){
        $category = Category::where('slug', $slug)->get()->first();
        $products = $category->Products;
        $categories = Category::all();
        return view('frontend.category_product', [
            'products'=> $products,
            'category'=> $category,
            'categories'=> $categories,
        ]);
    }
    function SubCategoryProduct($slug){
        $subcategory = Subcategory::where('slug', $slug)->get()->first();
        $products = $subcategory->Products;
        $categories = Category::all();
        return view('frontend.subcategory_product', [
            'products'=> $products,
            'subcategory'=> $subcategory,
            'categories'=> $categories,
        ]);
    }
    function ProductDetails($slug){
        $product = Product::where('slug', $slug)->get()->first();
        $galleries = $product->Gallery;
        $avaiable_colors = Inventory::where('product_id', $product->id)
        ->groupBy('color_id')
        ->selectRaw('count(*) as total, color_id')
        ->get();
        $avaiable_sizes = Inventory::where('product_id', $product->id)
        ->groupBy('size_id')
        ->selectRaw('count(*) as total, size_id')
        ->orderBy('size_id', 'desc')
        ->get();
        return view('frontend.product_details', [
            'product'=> $product,
            'galleries'=> $galleries,
            'colors'=> $avaiable_colors,
            'sizes'=> $avaiable_sizes
        ]);
    }
    function ProductTag($id){
        $tag = Tag::find($id);
        $products = $tag->Product;
        $categories = Category::all();
        return view('frontend.tag_product', [
            'tag'=> $tag,
            'products'=>$products,
            'categories'=> $categories
        ]);
    }
    function Invoice($order_id){
        return view('frontend.mail.invoice',[
            'order_id'=> $order_id
        ]);
    }
}
