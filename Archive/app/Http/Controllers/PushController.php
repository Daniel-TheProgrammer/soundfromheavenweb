<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushController extends Controller
{
	public function savepushtoken(Request $request){
		$user = $request->user();
		$user['pushtoken']=$request['token'];
		$user->update();
		return response()->json(true);
	}
}
