<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Session;
use DB;

class VotingController extends Controller
{
    public function count(){
        $votingplanid=Session::get('votingplanid');
        $count = Vote::where('votingplanid',$votingplanid)->select('contestentid', DB::raw('count(*) as total'))->groupby('contestentid')->get();
        return response()->json($count);
    }

    public function index(Request $request){
        return view('voting.votingview');
    }
    public function newindex(Request $request){
        return view('voting.newvotingview');
    }

    public function vote(Request $request){
        Session::put('contestentid', $request['contestentid']);
        return response()->json(true);
    }

    public function success(Request $request){
        return view('voting.votingsuccess');
    }

    public function failed(Request $request){
        return view('voting.votingfailed');   
    }

    public function paymentconfirm(Request $request){
        $obj['contestentid']=Session::get('contestentid');
        $obj['votingplanid']=Session::get('votingplanid');
        $obj['paymentid']=$request['transaction_id_'];

        if($obj['paymentid']!=null){
            if($request['transaction_status']=='SUCCESSFUL'){
                //$obj['success']=1;
                $exist = Vote::where('paymentid',$obj['paymentid'])->first();
                if($exist==null){
                    Vote::create($obj);
                }
            }
        }
        return response()->json(true);
    }

    public function stripepaymentconfirm(Request $request){
        $obj['contestentid']=Session::get('contestentid');
        $obj['votingplanid']=Session::get('votingplanid');
        $obj['paymentid']=$request['token'];
        Vote::create($obj);
        return response()->json(true);
    }
}
