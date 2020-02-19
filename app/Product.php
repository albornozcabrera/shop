<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$products->category , conocer la categoría de un procuto determiado
    public function category(){
    	return $this->belongsTo(category::class);
    }

    public function images(){
	return $this->hasMany(ProductImage::class);
	}
}
