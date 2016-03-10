<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use CodeCommerce\User;

class UserTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){

        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name'=>'Felipe Bispo',
                'email'=>'felipe_fpbs@yahoo.com.br',
                'password'=> Hash::make('123')
            ]
        );

        factory('CodeCommerce\User',10)->create();

    }

}