<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    public function index(){

    	$pFeatured = Product::featured()->get();
    	
    	$pRecommend = Product::recommend()->get();

    	$categories=Category::all();

    	return view('store.index',compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id){
    	
    	$pProducts = Product::categoryproducts($id)->get();

    	$categories=Category::all();
    	
    	$category=Category::find($id);
    	//print_r($category->name);

    	
    	return view('store.category_products',compact('categories', 'pProducts','category'));
    }
}
