<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin(){

        $data=[

            'email'=> 'felipe_fpbs@yahoo.com.br',
            'password'=>123

        ];

        //if(Auth::attempt($data)){
        //    return 'logou';
        //}

//        if(Auth::check()){
//            return 'logado';
//        }

        return Auth::user();
        return 'falhou';
    }

    public function getLogout(){

        Auth::logout();

        if(Auth::check()){
            return 'logado';
        }

        return 'nao esta logado';

    }
}
