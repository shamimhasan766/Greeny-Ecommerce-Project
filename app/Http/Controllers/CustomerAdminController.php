<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAdminController extends Controller
{
    function CustomerList(){
        $customers = Customer::all();
        return view('admin.customer.customer_list',[
            'customers'=> $customers
        ]);
    }
}
