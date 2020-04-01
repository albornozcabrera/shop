<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id){
    	$product = Product::find($id);
    	$images = $product->images;
    	return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    public function store(Request $request, $id){
    	
        $file = $request->file('photo');
        $path = public_path().'/images/products';
        $fileName = uniqid().$file->getClientOriginalName();//con uniqid ninguna imagen se reemplaza
        $moved = $file->move($path, $fileName);

        //crear 1 registro en la tabla products
        if ($moved) {
            $productImage = new productImage();
            $productImage->image = $fileName;
            $productImage->featured = false;
            $productImage->product_id  = $id;
            $productImage->save(); //grabará con el método insert
        }
        return back();
    }
    public function destroy(Request $request,$id){
    	//eliminar el archivo de host
        $productImage = ProductImage::find($request->image_id);        
        //dd($productImage->image);
        if (substr($productImage->image, 0, 4) === "http") {
            $deleted = true;
        }else {

            $fullPath = public_path().'/images/products/'.$productImage->image;
            //dd($fullPath);
            $deleted = File::delete($fullPath);
        }
        //eliminar el registro de la img en la BD
        if ($deleted) {
            $productImage->delete();
        }

        return back();
    }
}
