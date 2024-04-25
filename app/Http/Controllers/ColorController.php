<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    function AllColor(){
        $colors = Color::all();
        return view('admin.Inventory.color.all_color', [
            'colors'=> $colors
        ]);
    }
    function AddColor(){
        return view('admin.Inventory.color.add_color');
    }
    function TrashColor(){
        $trashedcolors = Color::onlyTrashed()->get();
        return view('admin.Inventory.color.trash', [
            'colors'=> $trashedcolors
        ]);
    }
    function ColorStore(Request $request){
        $request->validate([
            'color_name'=> 'required|unique:colors',
            'color_code'=> 'required|unique:colors'
        ]);
        Color::insert([
            'color_name'=> $request->color_name,
            'color_code'=> $request->color_code,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('color_success', 'Color Added Successfully');
    }
    function ColorChangeStatus($id){
        $color = Color::find($id);
        $color->status = $color->status == 0 ? 1 : 0;
        $color->save();
        return back();
    }
    function ColorDelete($id){
        Color::find($id)->delete();
        return back()->withDelete('Color Deleted You Can Find This In Trash');
    }
    function ColorRestore($id){
        $color = Color::onlyTrashed()->find($id);
        $color->restore();
        return back()->with('restored','Color "'.$color->color_name .'" restored');
    }
    function ColorForceDelete($id){
        $color = Color::onlyTrashed()->find($id);
        $color->forceDelete();
        return back()->withDelete('Size Deleted Permanently');
    }
}
