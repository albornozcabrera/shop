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

	public function getFeaturedImageUrlAttribute()
	{
		$featuredImage = $this->images()->where('featured', true)->firts();
		
		if (!$featuredImage)
			$featuredImage = $this->images()->firts();
		
		if ($featuredImage) {
			return $featuredImage->url;
		}

		//tenemos q devolver una imagen por defecto
		return 'images/products/default.jpg';
	
	}
}
