<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function AllProduct(){
        $products = Product::all();
        return view('admin.product.all_product', [
            'products'=> $products
        ]);
    }
    function AllProductGrid(){
        $products = Product::all();
        return view('admin.product.all_product_gird', [
            'products'=> $products
        ]);
    }
    function AddProduct(){
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();
        return view('admin.product.add_product', [
            'categories'=> $categories,
            'brands'=> $brands,
            'tags'=>$tags
        ]);
    }
    function TrashProduct(){
        $trashProduct = Product::onlyTrashed()->get();
        return view('admin.product.trash', [
            'products'=> $trashProduct
        ]);
    }
    function ProductView($id){
        $product = Product::find($id);
        return view('admin.product.view', [
            'product'=> $product
        ]);
    }
    function ProductEdit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $tags = Tag::all();
        $galleries = Gallery::all();
        return view('admin.product.edit', [
            'product'=> $product,
            'categories'=> $categories,
            'subcategories'=> $subcategories,
            'brands'=> $brands,
            'tags'=> $tags,
            'galleries'=> $galleries,
        ]);
    }
    function GetSubcategory(Request $request){
        $string = '<option value="" disabled selected>Select One</option>';
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        foreach($subcategories as $sub){
            $string .= '<option value="'.$sub->id.'">'.$sub->subcategory.'</option>';
        }
        echo $string;
    }
    function ProductStore(Request $request){

        $request->validate([
            'category_id'=> ['required', Rule::exists('categories', 'id') ],
            'subcategory_id' => [
                'required',
                Rule::exists('subcategories', 'id')->where(function ($query) use ($request) {
                    $query->where('category_id', $request->category_id);
                })
            ],
            'sku'=> 'required',
            'product_name'=> 'required',
            'discount' => [
                'nullable',
                'numeric',
                'min:1',
                'max:99',
            ],
            'short_desc' => [
                'required',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count($value);
                    if ($wordCount < 10) {
                        $fail('Short Description must be at least 10 words.');
                    }
                },
            ],
            'long_desc'=> 'required',
            'additional_info'=> 'required',
            'preview_img'=> 'required|image',
            'gallery' => 'required|array',
            'gallery.*' => 'image',

        ], [
            'gallery.*'=> 'All Gallery File Must Be An Image'
        ]);

        // slug
        $productName = str_replace('/', '-', $request->product_name);
        $slug = Str::lower(str_replace(' ', '-',$productName)).'-'. random_int(2000000, 9999999);

        // tags
        $tags = $request->tag_name;
        if($tags){
            $implode_tags = implode(',' , $tags);
        }

        // preview Img
        $preview_img = $request->preview_img;
        $extension = $preview_img->extension();
        $file_name = uniqid() . '.'. $extension;
        Image::make($request->preview_img)->resize(700, 700)->save(public_path('uploads/product/preview/'.$file_name));


        // Add New Product
        $newproduct = new Product();
        $newproduct->category_id = $request->category_id;
        $newproduct->subcategory_id = $request->subcategory_id;
        $newproduct->brand_id = $request->brand_id;
        $newproduct->sku = $request->sku;
        $newproduct->product_name = $request->product_name;
        $newproduct->discount = $request->discount;
        $newproduct->slug = $slug;
        $newproduct->short_desc = $request->short_desc;
        $newproduct->long_desc = $request->long_desc;
        $newproduct->additional_info = $request->additional_info;
        if($tags){
            $newproduct->tags = $implode_tags;
        }
        $newproduct->preview_img = 'uploads/product/preview/'.$file_name;
        $newproduct->created_at = Carbon::now();
        $newproduct->save();

        // Get the ID of the newly created product
        $newProductId = $newproduct->id;

        $galleries = $request->gallery;

        foreach($galleries as $gallery){
            $gallery_extension = $gallery->extension();
            $gallery_file_name = uniqid() . '.'. $gallery_extension;
            Image::make($gallery)->resize(700, 700)->save(public_path('uploads/product/gallery/'.$gallery_file_name));
            Gallery::insert([
                'product_id'=> $newProductId,
                'gallery_path'=> 'uploads/product/gallery/'.$gallery_file_name,
                'created_at'=> Carbon::now()
            ]);
        }
        if($tags){
            foreach ($tags as $tag) {
                $newproduct->tags()->attach($tag);
            }
        }
        return back()->withSuccess('Product Added Successfully');
    }
    function Changestatus($id){
        $product = Product::find($id);
        $product->status = $product->status == 0 ? 1 : 0;
        $product->save();
        return back();
    }
    function DeleteProduct($id){
        $product = Product::find($id);

        // delete Preview Image
        // unlink(public_path($product->preview_img));

        // $galleries = $product->Gallery;
        // delete gallery Image
        // foreach ($galleries as $gallery) {
        //     unlink(public_path($gallery->gallery_path));
        //     $gallery->delete();
        // }

        // delete Product from table
        $product->delete();

        return back()->withDelete('Product Deleted Successfully');
    }
    function RestoreProduct($id){
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        return back()->with('restored','Product "'.$product->product_name .'" restored');
    }
    function ProductForceDelete($id){
        $product = Product::onlyTrashed()->find($id);

        // Detach tags
        $product->tags()->detach();

        //delete Preview Image
        unlink(public_path($product->preview_img));

        $galleries = $product->Gallery;
        //delete gallery Image
        foreach ($galleries as $gallery) {
            unlink(public_path($gallery->gallery_path));
            $gallery->delete();
        }

         // Permanently delete the product
        $product->forceDelete();
        return back()->withDelete('Product Deleted Successfully');
    }
    function ProductUpdate(Request $request){
        $request->validate([
            'category_id'=> ['required', Rule::exists('categories', 'id') ],
            'subcategory_id' => [
                'required',
                Rule::exists('subcategories', 'id')->where(function ($query) use ($request) {
                    $query->where('category_id', $request->category_id);
                })
            ],
            'sku'=> 'required',
            'product_name'=> 'required',
            'discount' => [
                'nullable',
                'numeric',
                'max:99',
            ],
            'short_desc' => [
                'required',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count($value);
                    if ($wordCount < 10) {
                        $fail('Short Description must be at least 10 words.');
                    }
                },
            ],
            'long_desc'=> 'required',
            'additional_info'=> 'required',
            'preview_img'=> 'image',
            'gallery' => 'array',
            'gallery.*' => 'image',

        ], [
            'gallery.*'=> 'All Gallery File Must Be An Image'
        ]);

        // slug
        $slug = Str::lower(str_replace(' ', '-',$request->product_name)).'-'. random_int(2000000, 9999999);

        // tags
        $tags = $request->tag_name;
        $implode_tags = implode(',' , $tags);

        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->sku = $request->sku;
        $product->product_name = $request->product_name;
        $product->discount = $request->discount;
        $product->slug = $slug;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->additional_info = $request->additional_info;
        $product->tags = $implode_tags;
        $product->updated_at = Carbon::now();


        // preview Img
        if($request->preview_img){
            unlink(public_path($product->preview_img));
            $preview_img = $request->preview_img;
            $extension = $preview_img->extension();
            $file_name = str::lower(str_replace(' ' , '-', $request->product_name)).'-'. uniqid() . '.'. $extension;
            Image::make($request->preview_img)->resize(700, 700)->save(public_path('uploads/product/preview/'.$file_name));
            $product->preview_img = 'uploads/product/preview/'.$file_name;
        }

        // Gallery photo save
        if($request->gallery){
            $galleries = $request->gallery;

            foreach($galleries as $gallery){
                $gallery_extension = $gallery->extension();
                $gallery_file_name = str::lower(str_replace(' ' , '-', $request->product_name)).'-'. uniqid() . '.'. $gallery_extension;
                Image::make($gallery)->resize(700, 700)->save(public_path('uploads/product/gallery/'.$gallery_file_name));
                Gallery::insert([
                    'product_id'=> $product->id,
                    'gallery_path'=> 'uploads/product/gallery/'.$gallery_file_name,
                    'created_at'=> Carbon::now()
                ]);
            }
        }
        $product->save();
        foreach ($tags as $tag) {
            $product->tags()->syncWithoutDetaching($tag);
        }
        return back()->withSuccess('Product Updated');

    }
    function GalleryImageDelete($id){
        $image = Gallery::find($id);
        unlink(public_path($image->gallery_path));
        $image->delete();
        return back();
    }
}
