<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Vote;
use App\Service\StaticMaster;
use SevenGps\PayUnit;
use Session;

class PayUnitController extends Controller
{
    public function payforvote(Request $request){
        //create a payment record with contestentid and on confirmation update the voter table with payment id
        $obj['gatewayid']=StaticMaster::$payunitid;
        $obj['contestentid']=$request['contestentid'];
        $payment = Payment::create($obj);
        $description = 'Vote for '.$request['contestentname'];
        return view('payunit.payunitpayment',compact('payment','description'));
    }

    public function confirm(Request $request){
        if($request['transaction_status']=='SUCCESS'){
            $payment = Payment::where('id',$request['transaction_id'])->first();
            if($payment!=null){
                $payment['status']=StaticMaster::$paymentsuccess;
                $payment->update();
                $obj['contestentid']=$payment['contestentid'];
                $obj['paymentid']=$request['transaction_id'];
                $obj['votingplanid']=Session::get('votingplanid');
                Vote::create($obj);
                return redirect('voting/success');
            }
        }
        return redirect('voting/failed');
    }

    public function notifylater(Request $request){
        dd($request);
    }
}
