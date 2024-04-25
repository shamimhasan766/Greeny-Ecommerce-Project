<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    function Dashboard(){
        return view('admin.dashboard');
    }
    function UserList(){
        $users = User::all();
        return view('admin.user.user_list', [
            'users'=> $users
        ]);
    }
    function UserProfile(){
        return view('admin.user.profile');
    }
    function UserSetting(){
        return view('admin.user.setting');
    }
    function UserProfileUpdate(Request $request){
        $request->validate([
            'name'=> 'required',
            'username'=> [
                'required',
                Rule::unique('profiles')->ignore(Auth::user()->profile->id),
            ],
        ]);
        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->name;
        $user->save();

        // Update the user's profile information
        $profile = $user->profile; // Assuming the profile is a separate model related to the user
        $profile->username = $request->username;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->gender = $request->gender;
        $profile->phone = $request->phone;
        $profile->zip = $request->zip;
        $profile->website = $request->website;
        $profile->country = $request->country;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->address_1 = $request->address_1;
        $profile->address_2 = $request->address_2;
        $profile->twitter = $request->twitter;
        $profile->facebook = $request->facebook;
        $profile->instagram = $request->instagram;
        $profile->github = $request->github;
        $profile->save();

        return back()->with('success', 'Profile Updated Successfully');
    }
    function UserProfilePhotoUpdate(Request $request)
    {
        $request->validate([
            'photo'=> 'required|image'
        ]);

        $photo = $request->file('photo');
        $extension = $photo->extension();
        $filename = Str::slug(Auth::user()->name) . '-' . uniqid() . '.' . $extension;
        Image::make($photo)->save(public_path('admin/img/user/'.$filename));

        $profile = Auth::user()->profile;
        $profile->photo = 'admin/img/user/'.$filename;
        $profile->save();
        return back();
    }

}
