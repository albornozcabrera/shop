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
        //dd($products);
    	return view('admin.products.index')->with(compact('products'));
    }

    public function create (){
    	return view('admin.products.create');
    }

    public function store (Request $request){
		//validación de datos en el controlador

		$messages =[
			'name.required' => 'Es necesario ingresar un nombre al producto.',
			'name.min' => 'Es necesario que el nombre del prodcuto tenga al menos 3 caracteres.',
			'description.required' => 'Es necesario ingresar una descripción al producto.',
			'description.max' => 'La descripción sólo permite 200 caracteres.',    		
    		'price.required' => 'Es necesario definir un precio al producto',
    		'price.numeric' => 'Ingrese un precio válido.',
    		'price.min' => 'No se admiten valores negativos.'
		];

    	$rules =[
    		'name' =>'required|min:3',
    		'description' =>'required|max:200',
    		'price' =>'required|numeric|min:0' //validación numerica
    	];
		$this->validate($request, $rules, $messages);

    	//dd($request->all()); //muestra todo el JSON que trae el request
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
    	$messages =[
			'name.required' => 'Es necesario ingresar un nombre al producto.',
			'name.min' => 'Es necesario que el nombre del prodcuto tenga al menos 3 caracteres.',
			'description.required' => 'Es necesario ingresar una descripción al producto.',
			'description.max' => 'La descripción sólo permite 200 caracteres.',    		
    		'price.required' => 'Es necesario definir un precio al producto',
    		'price.numeric' => 'Ingrese un precio válido.',
    		'price.min' => 'No se admiten valores negativos.'
		];

    	$rules =[
    		'name' =>'required|min:3',
    		'description' =>'required|max:200',
    		'price' =>'required|numeric|min:0' //validación numerica
    	];
		$this->validate($request, $rules, $messages);


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
    	//return redirect('/admin/products');
    }
}
