<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\CustomerModel;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $admin_name = 'Sukhdeep Singh';

    
        $data = compact('admin_name');

        return view('home')->with($data);
    }

    public function contact(){
        $products = ['Mobile','Watch','Laptop','Mouse','Keyboard'];


        $data = compact('products');
        return view('contact')->with($data);
    }

    public function about(){
        return view('about');
    }
    
    public function register(Request $request){
        $name = $request->input('name');
        $city = $request->input('city');
        $age = $request->input('age');

        $customer = new CustomerModel;
        $customer->name = $name;
        $customer->city = $city;
        $customer->age = $age;
        $customer->save();

        $success = 'Registration successful';
        $data = compact('success');
        return view('home')->with($data);
    } 

    public function customers(){
        $customers = CustomerModel::all();
        $data = compact('customers');
        return view('customers')->with($data);
    }  


}
