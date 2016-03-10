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

});

Route::group(['prefix'=> 'admin'], function (){
    Route::match(['get','post','put','delete'],'categories/{id?}',['as'=>'categories', 'uses'=> 'AdminCategoriesController@index',function($id=0){
        if($id)
            //return Redirect::action('WelcomeController@exemplo');
        return 'Não possui id';
    }])->where ('id','[0-9]+');

    Route::match(['get','post','put','delete'],'products/{id?}',['as'=>'products', 'uses'=> 'AdminProductsController@index',function($id=0){
        if($id)
            //return Redirect::action('WelcomeController@exemplo');
        return 'Não possui id';
    }])->where ('id','[0-9]+');

});

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('admin/categories', 'AdminCategoriesController@index');

Route::get('admin/products', 'AdminProductsController@index');
*/

//Fase 4 - CRUD
Route::get('categories',['as'=>'category', 'uses'=>'CategoriesController@index']);

Route::post('categories',['as'=>'category.store', 'uses'=>'CategoriesController@store']);

Route::get('categories/create',['as'=>'category.create', 'uses'=>'CategoriesController@create']);

Route::get('categories/{id}/destroy',['as'=>'category.destroy', 'uses'=>'CategoriesController@destroy']);

Route::get('categories/{id}/edit',['as'=>'category.edit', 'uses'=>'CategoriesController@edit']);

Route::put('categories/{id}/update',['as'=>'category.update', 'uses'=>'CategoriesController@update']);

//REPLICANDO PARA PRODUCTS

Route::get('products',['as'=>'product', 'uses'=>'ProductsController@index']);

Route::post('products',['as'=>'product.store', 'uses'=>'ProductsController@store']);

Route::get('products/create',['as'=>'product.create', 'uses'=>'ProductsController@create']);

Route::get('products/{id}/destroy',['as'=>'product.destroy', 'uses'=>'ProductsController@destroy']);

Route::get('products/{id}/edit',['as'=>'product.edit', 'uses'=>'ProductsController@edit']);

Route::put('products/{id}/update',['as'=>'product.update', 'uses'=>'ProductsController@update']);
