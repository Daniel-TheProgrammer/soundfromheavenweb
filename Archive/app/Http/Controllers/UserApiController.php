<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserImage;
use Response;

class UserApiController extends Controller
{
	public function saveprofileimageurl(Request $request){
		$user = $request->user();
		$profileimage = UserImage::where('typeid',$user['id'])->where('type',1)->get();
		if($profileimage==null){
			
		} else {
			foreach($profileimage as $p){
				
				$p['typeid']=0;
				$p->update();
			}
		}
		$obj['typeid']=$user['id'];
		$obj['amazonurl']=$request['url'];
		$obj['type']=1;
		UserImage::create($obj);
		return response()->json(true);
	}
	
	public function getjsonlist(Request $request){
		$user = User::whereNotNull('firebaseuuid')->with('tasks')->get();
		return response()->json($user);
	}
	
    public function register(Request $request)
    {
    	$newflag = 0;
    	$obj = null;
    	if($request['appid']!=null && $request['appid']!='')
    	{
    		$obj = User::where('appid',$request['appid'])->first();
    		if($obj==null)
    		{
    			if(isset($request['email']) && $request['email']!='')
    			{
    				$obj = User::where('email',$request['email'])->first();
    			}
    		}
    		if($obj==null)
    		{
    			if(isset($request['fbid']) && $request['fbid']!='')
    			{
    				$obj = User::where('fbid',$request['fbid'])->first();
    			}
    		}
    	}
    	if($obj == null)
    		$newflag = 1;
    	if(isset($request['name']))
    		$obj['name']=$request['name'];
    	if(isset($request['appid']))
    	{
    		$obj['appid']=$request['appid'];
    	} else {
    		$result['code']=-1;
    		$result['message']='User appid is mandatory';
    		return Response::json($result);
    	}
    	if(isset($request['email']) && $request['email']!='')
    		$obj['email']=$request['email'];
    	if(isset($request['fbid']) && $request['fbid']!='')
    		$obj['fbid']=$request['fbid'];
    	if(isset($request['phoneno']) && $request['phoneno']!='')
    		$obj['phoneno']=$request['phoneno'];
    	if(isset($request['userprofileurl']) && $request['userprofileurl']!='')
    		$obj['userprofileurl']=$request['userprofileurl'];
    	if(isset($request['phoneverified']) && $request['phoneverified']!='')
    		$obj['phoneverified']=$request['phoneverified'];
    	//check if appid is present or not
    	if($newflag==0)
    	{
    		$obj->update();
    		$result['appid']=$obj['appid'];
    		$result['code']=$obj['id'];
    		$result['message']='Updated Successfully';
    	} else {
    		
    		$user = User::create($obj);
    		$result['appid']=$user['appid'];
    		$result['code']=$user['id'];
    		$result['message']='Created Successfully';
    	}
    	
    	return Response::json($result);
    }
    
    public function getUser(Request $request){
    	$user = Auth::user();
    	dd($user);
    }
}
