<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    function CustomerLogin(){
        return view('frontend.customer.customer_login');
    }
    function CustomerRegister(){
        return view('frontend.customer.customer_register');
    }
    function StoreCustomer(Request $request){
        $request->validate([
            'f_name'=> 'required',
            'l_name'=> 'required',
            'email'=> 'required|unique:customers',
            'password'=> 'required',
            'password_confirmation'=> 'required',
        ]);

        Customer::insert([
            'f_name'=> $request->f_name,
            'l_name'=> $request->l_name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'created_at'=> Carbon::now()
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('index');
        }
    }
    function LoginCustomer(Request $request){
       $request->validate([
            'email' => 'required|exists:customers,email',
            'password'=> 'required',
       ]);
       if (Auth::guard('customer')->attempt(['email'=> $request->email, 'password' => $request->password]) ) {
        return redirect()->route('index');
       }
       else{
        return back()->with('error', 'email and password does not matched');
       }
    }
    function CustomerProfile(){
        $countries = Country::all();
        return view('frontend.customer.profile', [
            'countries'=> $countries
        ]);
    }
    function CustomerAddress(){
        $countries = Country::all();
        return view('frontend.customer.address',[
            'countries'=> $countries
        ]);
    }
    function CustomerOrders(){
        $orders = Auth::guard('customer')->user()->Orders;
        return view('frontend.customer.orders', [
            'orders'=> $orders
        ]);
    }
    function CustomerLogOut(){
        Auth::guard('customer')->logout();
        return redirect()->route('index');
    }
    function CustomerProfileUpdate(Request $request){
        $request->validate([
            'f_name'=> 'required',
            'l_name'=> 'required',
            'email'=> [
                'required',
                'email',
                Rule::unique('customers')->ignore(Auth::guard('customer')->id()),
            ],
            'picture'=> 'image',
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->f_name = $request->f_name;
        $customer->l_name = $request->l_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        if ($request->old_password) {
            if (Auth::guard('customer')->attempt(['email'=> $customer->email , 'password' => $request->old_password]) ) {
                $request->validate([
                    'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/|confirmed', // Ensure that the new password matches the confirmation
                ]);
                $customer->password = bcrypt($request->password);
            }
            else{
            return back()->with('old_password', 'incorrect old password');
            }
        }
        if($request->picture){
            $extension = $request->picture->extension();
            $file_name = str::lower(str_replace(' ' , '-', $request->f_name)).'-'. uniqid() . '.'. $extension;
            Image::make($request->picture)->resize(300,300)->save(public_path('uploads/customer/photo/'.$file_name));

            $customer->photo = 'uploads/customer/photo/'.$file_name;
        }

        $customer->save();
        return back()->withSuccess('Profile Updated');
    }
    function CustomerAddressUpdate(Request $request){
        $customer = Auth::guard('customer')->user();
        $customer->country_id = $request->country_id;
        $customer->city_id = $request->city_id;
        $customer->address = $request->address;
        $customer->save();
        return back()->withSuccess('Address Updated');
    }
    function CustomerGetCity(Request $request){
        $string = '';
        $cities = City::where('country_id', $request->country_id)->get();
        foreach($cities as $city){
            $string .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
        echo $string;
    }
}
