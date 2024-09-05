<?php

namespace App\Http\Controllers;

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

    public function about($city,$state=null){
        echo "<h1>The city is :  $city, and state is : $state</h1>";
    }
    
    public function add_numbers(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');

        $result = $num1 + $num2;

        $data = compact('num1','num2','result');
        return view('home')->with($data);
    }  
}
