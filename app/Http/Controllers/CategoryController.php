<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function AllCategory(){
        $categories = Category::all();
        return view('admin.category.all_category', [
            'categories'=> $categories
        ]);
    }
    function AddCategory(){
        return view('admin.category.add_category');
    }
    function StoreCategory(Request $request){
        $request->validate([
            'name'=> 'required|unique:categories',
            'photo'=> 'required|mimes:jpg,gif,jpeg,png|max:1024',
        ]);

        $slug = Str::lower(str_replace(' ', '-',$request->name)).'-'. random_int(200000, 999999);

        $extension = $request->photo->extension();
        $file_name = str::lower(str_replace(' ' , '-', $request->name)).'-'. uniqid() . '.'. $extension;
        Image::make($request->photo)->save(public_path('uploads/category/'.$file_name));

        Category::insert([
            'name'=> $request->name,
            'photo'=> 'uploads/category/'. $file_name,
            'slug'=> $slug,
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('success', 'Category Added');
    }
    function ChangeStatus($id){
        $category = Category::find($id);
        if($category){
            // Category exists, so toggle its status
            $category->status = ($category->status == 0) ? 1 : 0;
            $category->save();
        }
        return back();
    }
    function EditCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit_category', [
            'category'=>$category
        ]);
    }
    function UpdateCategory(Request $request, $id){

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ],
        [
            'name.required'=> 'name field is required'
        ]);

        // Find the category to be updated
        $category = Category::findOrFail($id);
        $slug = Str::lower(str_replace(' ', '-',$request->name)).'-'. random_int(200000, 999999);

        // Update category name
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();


        if ($request->hasFile('photo')) {
            $request->validate([
            'photo' => 'mimes:jpg,gif,jpeg,png|max:1024',
            ]);
            unlink(public_path($category->photo));
            $extension = $request->photo->extension();
            $path = 'uploads/category/';
            $file_name = Str::lower(str_replace(' ', '-', $request->name)). '-' . uniqid() . '.' . $extension;
            Image::make($request->photo)->save(public_path($path . $file_name));

            // Update category image path in the database
            $category->photo = $path . $file_name;
            $category->save();
        }

        return back()->withSuccess('Category Updated');
    }
    function DeleteCategory($id){
        $category = Category::find($id);

        // unlink($category->photo);
        $category->delete();
         return back()->with('delete', 'Category Deleted');
    }
    function TrashCategory(){
        $trashCategories = Category::onlyTrashed()->get();
        return view('admin.category.trash',[
            'categories'=> $trashCategories
        ]);
    }
    function RestoreCategory($id){
        $Category = Category::onlyTrashed()->find($id);
        $Category->restore();
        return back()->with('restored','Category "'.$Category->name .'" restored');
    }

    function CategoryForceDelete($id){
       $category = Category::onlyTrashed()->find($id);
       unlink($category->photo);
       $category->forceDelete();
       return back()->with('force_delete', 'Category "'. $category->name .'" Permanently Deleted');
    }
}
