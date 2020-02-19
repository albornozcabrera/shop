<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //acá haremos uso de los model factories
       /* factory(Category::class, 5)->create();
    	factory(Product::class, 100)->create();
        factory(ProductImage::class, 200)->create();*/
        // si quieres que un producto tenga
        $categories = factory(Category::class, 5)->create();
        $categories->each(function($category) {
            $products = factory(Product::class,20)->make();
            $category->products()->saveMany($products);

            $products->each(function ($p) {
                $images = factory(ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });
        });
    }
}
