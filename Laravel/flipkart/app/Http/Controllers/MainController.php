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

    public function contact($name=null){
        $products = ['Mobile','Watch','Laptop','Mouse','Keyboard'];

        $data = compact('name','products');
        return view('contact')->with($data);
    }

    public function about($city,$state=null){
        echo "<h1>The city is :  $city, and state is : $state</h1>";
    }
}
