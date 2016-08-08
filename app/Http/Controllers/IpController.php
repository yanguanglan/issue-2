<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IpController extends Controller
{
    //
    public function getiponline(Request $request)
    {
    	//var_dump($request->all());
    	$this->validate($request, [
        	'ddh' => 'required|max:255|exists:orders,ddh',
        	'sl' => 'required|integer|max:999',
        ]);

    	//api
    	if($request->has('api')){
    		return view('ip', ['url'=> url('/getip').'?ddh='.$request->ddh.'&sl='.$request->sl]);
    	}

		$ips = app('redis')->srandmember('ips', $request->sl);

    	//online ip
    	return view('ip', ['ips'=>$ips]);
    }

    public function getip(Request $request)
    {

    	//从reids里面查找订单号，如果有的话，就提取IP,如果没有重数据库里面提取

    	if(!$request->has('ddh') || !$request->has('sl')){
    		return 'sl or ddh must be required';
    	}

    	if($request->sl>999){
    		return 'sl must be lt 999 number';
    	}

    	$ddh = app('redis')->get($request->ddh);

    	if(!$ddh){
    		$db_ddh = \App\Order::where('ddh', $request->ddh)->first();

    		if(!$db_ddh){
    			return "ddh not found";
    		}else{
    			app('redis')->set($request->ddh, $request->ddh);
    		}
    	}

       $ips = app('redis')->srandmember('ips', $request->sl);

       if($request->has('fm') && $request->fm == 'json'){
       		return response()->json($ips);
       }

       return view('ips', ['ips'=>$ips]);
    }
}
