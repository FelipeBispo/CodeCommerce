<?php namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;

class  AdminCategoriesController extends Controller{

    private $categories;

    public function __construct(Category $category){
        $this->middleware('guest');
        $this->categories = $category;
    }

    public function categories(){

        $categories = $this->categories->all();

        return view('category',compact('categories'));

    }

}

