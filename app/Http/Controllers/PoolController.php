<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PoolController extends Controller
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
        $pools = \App\Pool::latest()->paginate(15);

        return view('pool')->with('pools', $pools);
    }

    public function create(Request $request)
    {
        return view('pool-create');
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
        'api' => 'required|max:255',
        'name' => 'required|max:255',
        ]);

        $data = [ 
            'api' => $request->api,
            'name' => $request->name
        ];

        \App\Pool::create($data);

        return redirect('/pools');
    }


}
