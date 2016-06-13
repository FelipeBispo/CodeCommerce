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


Route::get('admin/products', 'AdminProductsController@index');
*/

Route::get('/', 'StoreController@index');

Route::get('category/{id}',['as'=>'store.category', 'uses'=>'StoreController@category']);
Route::get('product/{id}',['as'=>'store.product', 'uses'=>'StoreController@product']);
Route::get('tag/{id}',['as'=>'store.tag', 'uses'=>'StoreController@tag']);
Route::get('cart',['as'=>'cart', 'uses'=>'CartController@index']);
Route::get('cart/add/{id}',['as'=>'cart.add', 'uses'=>'CartController@add']);
Route::get('cart/destroy/{id}',['as'=>'cart.destroy', 'uses'=>'CartController@destroy']);
Route::get('cart/update/{id}/{quantity}',['as'=>'cart.update', 'uses'=>'CartController@update']);

Route::get('checkout/placeOrder',['as'=>'checkout.place', 'uses'=>'CheckoutController@place']);

Route::group(['prefix'=>'admin', 'middleware'=>'isadmin', 'where'=>['id'=>'[0-9]+']], function(){
    //Fase 4 - CRUD
    Route::group(['prefix'=>'categories'], function(){

        Route::get('',['as'=>'category', 'uses'=>'CategoriesController@index']);
        Route::post('',['as'=>'category.store', 'uses'=>'CategoriesController@store']);
        Route::get('create',['as'=>'category.create', 'uses'=>'CategoriesController@create']);
        Route::get('{id}/destroy',['as'=>'category.destroy', 'uses'=>'CategoriesController@destroy']);
        Route::get('{id}/edit',['as'=>'category.edit', 'uses'=>'CategoriesController@edit']);
        Route::put('{id}/update',['as'=>'category.update', 'uses'=>'CategoriesController@update']);

    });
    
    Route::group(['prefix'=>'products'  ], function(){
    //REPLICANDO PARA PRODUCTS

        Route::get('',['as'=>'product', 'uses'=>'ProductsController@index']);
        Route::post('',['as'=>'product.store', 'uses'=>'ProductsController@store']);
        Route::get('create',['as'=>'product.create', 'uses'=>'ProductsController@create']);
        Route::get('{id}/destroy',['as'=>'product.destroy', 'uses'=>'ProductsController@destroy']);
        Route::get('{id}/edit',['as'=>'product.edit', 'uses'=>'ProductsController@edit']);
        Route::put('{id}/update',['as'=>'product.update', 'uses'=>'ProductsController@update']);

        Route::group(['prefix'=>'images'], function(){
            Route::get('{id}/product',['as'=>'products.images', 'uses'=>'ProductsController@images']);
            Route::get('create/{id}/product',['as'=>'products.images.create', 'uses'=>'ProductsController@createImages']);
            Route::post('store/{id}/product',['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
            Route::get('destroy/{id}/product',['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']);


        });

    });

});

Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
    'test'=>'TestController'
]);
