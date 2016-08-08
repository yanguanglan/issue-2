<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_num = \App\Order::count();
        $pool_num = \App\Pool::count();
        $log_num = \App\Log::count();
        $ip_num = app('redis')->scard('ips');

        return view('home', ['order_num'=>$order_num, 'pool_num'=>$pool_num, 'log_num'=>$log_num, 'ip_num'=>$ip_num]);
    }
}
