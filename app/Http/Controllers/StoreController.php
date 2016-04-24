<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    public function index(){

    	$pFeatured = Product::featured()->get();
    	
    	$pRecommend = Product::recommend()->get();

    	$categories=Category::all();

    	return view('store.index',compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id){
    	
        $categories=Category::all();
        $category=Category::find($id);

        $pProducts = Product::OfCategory($id)->get();
        //print_r($category->name);

        
        return view('store.category',compact('categories', 'pProducts','category'));
    }


    public function product($id){
        
        $categories=Category::all();
        $product=Product::find($id);

        return view('store.product', compact('categories','product'));
    }

    public function tag($id){
        
        $categories=Category::all();
        $tag = Tag::find($id);
        $products = $tag->products;

        return view('store.tag', compact('categories','products','tag'));
    }
}
