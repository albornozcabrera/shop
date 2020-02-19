<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index ()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create (){
    	return view('admin.products.create');
    }

    public function store (Request $request){
    	//dd($request->all());
    	//return view('');
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();//insert en la tabla

    	return redirect('/admin/products');
    }

    public function edit ($id){
    	//return "mostrar aquí el form de edificipon para el producto con id $id";
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));
    }

    public function update (Request $request, $id){
    	//dd($request->all());
    	//return view('');
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();//update en la tabla

    	return redirect('/admin/products');
    }
    public function destroy ($id){
    	//dd($request->all());
    	//return view('');
    	$product = Product::find($id);    	
    	$product->delete();//elimina en la tabla

    	return back();
    }
}