<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* Fase 3 - Rotas
Route::get('category/{category}', function (\CodeCommerce\Category $category){

    //return $category->name;
    dd($category);

});*/

Route::group(['prefix'=> 'admin'], function (){
    Route::get('categories/{id?}',['as'=>'categories', 'uses'=> 'AdminCategoriesController@index',function($id=0){
        if($id)
            return Redirect::action('WelcomeController@exemplo');
        return 'Não possui id';
    }])->where ('id','[0-9]+');

    Route::get('products/{id?}',['as'=>'products', 'uses'=> 'AdminProductsController@index',function($id=0){
        if($id)
            return Redirect::action('WelcomeController@exemplo');
        return 'Não possui id';
    }])->where ('id','[0-9]+');

});

Route::get('exemplo', 'WelcomeController@exemplo');

//Route::get('admin/categories', 'AdminCategoriesController@index');

//Route::get('admin/products', 'AdminProductsController@index');

//Fase 4 - CRUD
Route::get('categories','CategoriesController@index');