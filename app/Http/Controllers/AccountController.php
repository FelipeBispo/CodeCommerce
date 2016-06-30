<?php

namespace CodeCommerce\Http\Controllers;


use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use CodeCommerce\Order;

class AccountController extends Controller
{
    public function index(){

    }

    public function orders(){

        $orders=Auth::user()->orders;

        return view('store.orders',compact('orders'));

    }

    public function all(){
        $orders = Order::all();
        return view('store.admin_orders', compact('orders'));
    }

    public function update_status($id, $status, Request $request)
    {
        $order = Order::find($id);

        $order->status = $status;

        $order->save();
        
        return response()->json(array('success' => true));

    }
}
