<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    function AllBrand(){
        $brands = Brand::all();
        return view('admin.brand.all_brands', [
            'brands'=> $brands
        ]);
    }
    function AddBrand(){
        return view('admin.brand.add_brand');
    }
    function TrashBrand(){
        $trashBrands = Brand::onlyTrashed()->get();
        return view('admin.brand.trash',[
            'brands'=> $trashBrands
        ]);
    }
    function StoreBrand(Request $request){
        $request->validate([
            'name'=> 'required|unique:brands',
            'logo'=> 'required|mimes:jpg,gif,jpeg,png|max:1024',
        ]);

        $slug = Str::lower(str_replace(' ', '-',$request->name)).'-'. random_int(200000, 999999);

        $extension = $request->logo->extension();
        $file_name = str::lower(str_replace(' ' , '-', $request->name)).'-'. uniqid() . '.'. $extension;
        Image::make($request->logo)->save(public_path('uploads/brand/'.$file_name));

        Brand::insert([
            'name'=> $request->name,
            'logo'=> 'uploads/brand/'. $file_name,
            'slug'=> $slug,
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('success', 'Brand Added');
    }
    function DeleteBrand($id){
        $brand = Brand::find($id);

        // unlink($brand->logo);
        $brand->delete();
         return back()->with('delete', 'Brand Deleted');
    }
    function RestoreBrand($id){
        $brand = Brand::onlyTrashed()->find($id);
        $brand->restore();
        return back()->with('restored','Brand "'.$brand->name .'" restored');
    }
    function BrandForceDelete($id){
        $brand = Brand::onlyTrashed()->find($id);
        unlink($brand->logo);
        $brand->forceDelete();
        return back()->with('force_delete', 'Brand Permanently Deleted');
    }
}
