<?php namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Product;

class  AdminProductsController extends Controller{

    private $products;

    public function __construct(Product $product){
        $this->middleware('guest');
        $this->products = $product;
    }

    public function products(){

        $products = $this->products->all();

        return view('product',compact('products'));

    }
}

