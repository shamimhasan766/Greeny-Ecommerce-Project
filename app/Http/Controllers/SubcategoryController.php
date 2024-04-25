<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function AllSubCategory(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.all_subcategory', [
            'subcategories'=> $subcategories,
            'categories'=> $categories
        ]);
    }
    function AddSubCategory(){
        $categories = Category::all();
        return view('admin.subcategory.add_subcategory', [
            'categories'=> $categories
        ]);
    }
    function TrashSubCategory(){
        $trashSubCategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.trash',[
            'subcategories'=> $trashSubCategories
        ]);
    }
    function StoreSubCategory(Request $request){
        $request->validate([
            'category'=> ['required', new \App\Rules\CategoryExists],
            'subcategory'=> 'required|unique:subcategories,subcategory'
        ]);
        $slug = Str::lower(str_replace(' ', '-',$request->subcategory)).'-'. random_int(200000, 999999);
        Subcategory::insert([
            'category_id'=> $request->category,
            'subcategory'=> $request->subcategory,
            'slug'=> $slug,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('success', 'Subcategory added');
    }
    function ChangeSubCategoryStatus($id){
        $subcategory = Subcategory::find($id);
        if($subcategory){
            // Category exists, so toggle its status
            $subcategory->status = ($subcategory->status == 0) ? 1 : 0;
            $subcategory->save();
        }
        return back();
    }
    function DeleteSubCategory($id){
        $subcategory = Subcategory::find($id);

        // unlink($category->photo);
        $subcategory->delete();
         return back()->with('delete', 'Sub Category Deleted');
    }
    function RestoreSubCategory($id){
        $Subcategory = Subcategory::onlyTrashed()->find($id);
        $Subcategory->restore();
        return back()->with('restored','SubCategory "'.$Subcategory->name .'" restored');
    }
    function SubCategoryForceDelete($id){
        $subcategory = Subcategory::onlyTrashed()->find($id);
        $subcategory->forceDelete();
        return back()->with('force_delete', 'Category Permanently Deleted');
    }
}
