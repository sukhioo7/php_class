<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function contact($name){
        $data = compact('name');
        return view('contact')->with($data);
    }

    public function about($city,$state=null){
        echo "<h1>The city is :  $city, and state is : $state</h1>";
    }
}
