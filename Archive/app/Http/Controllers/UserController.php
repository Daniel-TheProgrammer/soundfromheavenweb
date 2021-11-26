<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Team;
use App\Models\Group;
use App\Models\VotingPlan;
use Response;
use Carbon\Carbon;
use DB;
use Session;

class UserController extends Controller
{
    public function index(){
    	return view('user.user');
    }
    public function saveuser(Request $request){
		$obj = null;
        if($request['id']==null ){
            $obj['team_id']=$request['team_id'];
            $obj['group_id']=$request['group_id'];
            $obj['name']=$request['name'];
            $obj['email']=$request['email'];
            $obj = User::create($obj);
        } else {
            $obj = User::where('id',$request['id'])->first();
            $obj['team_id']=$request['team_id'];
            $obj['group_id']=$request['group_id'];
            $obj['name']=$request['name'];
            $obj['email']=$request['email'];
            $obj->update();
        }
		return response()->json($obj);
    }

    public function fetchuser(Request $request){
        $obj = User::where('group_id', $request['group'])->with('image','team','group')->get();
        return response()->json($obj);
    }
    public function fetchvoting(Request $request){
        
        $now = Carbon::now()->format('Y-m-d');
        $users = [];
        $obj = VotingPlan::whereRaw(" STR_TO_DATE(startdate, '%Y-%m-%d') <= '".$now."' and STR_TO_DATE(enddate, '%Y-%m-%d') >= '".$now."'")->first();
        if($obj!=null){
            Session::put('votingplanid', $obj['id']);
            $users = User::whereIn('id',explode(',',$obj['user_id']))->with('image','team','group')->get();
        }
        $result['users']=$users;
        
        return response()->json($result);
    }
    public function fetchgroup(){
        $obj = Group::all();
        return response()->json($obj);
    }
}
