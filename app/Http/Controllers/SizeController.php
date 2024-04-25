<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    function AllSize(){
        $sizes = Size::all();
        return view('admin.Inventory.size.all_size', [
            'sizes'=> $sizes
        ]);
    }
    function AddSize(){
        return view('admin.Inventory.size.add_size');
    }
    function TrashSize(){
        $trashedsizes = Size::onlyTrashed()->get();
        return view('admin.Inventory.size.trash', [
            'sizes'=> $trashedsizes
        ]);
    }
    function SizeStore(Request $request){
        $request->validate([
            'size_name'=> 'required|unique:sizes',
        ]);
        Size::insert([
            'size_name'=> $request->size_name,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('size_success', 'Size Added Successfully');
    }
    function SizeChangeStatus($id){
        $size = Size::find($id);
        $size->status = $size->status == 0 ? 1 : 0;
        $size->save();
        return back();
    }
    function SizeDelete($id){
        Size::find($id)->delete();
        return back()->withDelete('Size Deleted You Can Find This In Trash');
    }
    function SizeRestore($id){
        $size = Size::onlyTrashed()->find($id);
        $size->restore();
        return back()->with('restored','Color "'.$size->size_name .'" restored');
    }
    function SizeForceDelete($id){
        $size = Size::onlyTrashed()->find($id);
        $size->forceDelete();
        return back()->withDelete('Size Deleted Permanently');
    }
}
