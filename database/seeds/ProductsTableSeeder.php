<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class ProductsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){

        DB::table('products')->truncate();

        factory('CodeCommerce\products',15)->create();

    }

}