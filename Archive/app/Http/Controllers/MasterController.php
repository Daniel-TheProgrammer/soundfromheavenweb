<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDescription;

class MasterController extends Controller
{
	public function descriptions(){
		$list = MasterDescription::whereIn('id',[1,2,3,4,5,6,7])->get();
		return response()->json($list);
	}
}
