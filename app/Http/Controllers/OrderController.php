<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
    	$orders = \App\Order::latest()->paginate(15);

    	return view('order')->with('orders', $orders);
    }

    public function create(Request $request)
    {
        return view('order-create');
    }

    /**
    * Create a new task.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        ]);

        $data = [ 
            'ddh' =>str_random(14),
            'name' => $request->name
        ];

        \App\Order::create($data);

        return redirect('/orders');
    }
}
