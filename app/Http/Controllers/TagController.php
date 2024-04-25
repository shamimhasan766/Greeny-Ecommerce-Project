<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function AllTag(){
        $tags = Tag::all();
        return view('admin.tag.all_tags', [
            'tags'=> $tags
        ]);
    }
    function AddTag(){
        return view('admin.tag.add_tag');
    }
    function TrashTag(){
        $trashtags = Tag::onlyTrashed()->get();
        return view('admin.tag.trash', [
            'tags'=> $trashtags
        ]);
    }
    function StoreTag(Request $request){
        $request->validate([
            'tag_name'=> 'required|unique:tags',
        ]);

        Tag::insert([
            'tag_name'=> $request->tag_name,
            'created_at'=> Carbon::now(),
        ]);
        return back()->withSuccess('Tag Added');
    }
    function DeleteTag($id){
        $tag = Tag::find($id);

        // unlink($category->photo);
        $tag->delete();
         return back()->with('delete', 'Tag Deleted');
    }
    function RestoreTag($id){
        $tag = Tag::onlyTrashed()->find($id);
        $tag->restore();
        return back()->with('restored','Tag "'.$tag->name .'" restored');
    }
    function TagForceDelete($id){
        $tag = Tag::onlyTrashed()->find($id);
       $tag->forceDelete();
       return back()->with('force_delete', 'Tag Permanently Deleted');
    }
}
