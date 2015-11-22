<?php namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;

class  WelcomeController extends Controller{

    private $categories;

    public function __construct(Category $category){
        $this->middleware('guest');
        $this->categories = $category;
    }


    public function index(){
        return view('welcome');
    }

    public function categories(){

        $categories = $this->categories->all();

        return view('exemplo',compact('categories'));

    }

    public function products(){

        $categories = $this->categories->all();

        return view('exemplo',compact('categories'));

    }
}

