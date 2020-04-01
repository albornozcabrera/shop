<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class TestController extends Controller
{

    public function welcome()
    {
    	$products = product::all();
    	//dd($products->category->name );
    	return view('welcome')->with(compact('products'));
        //return view('welcome');
    }
}
