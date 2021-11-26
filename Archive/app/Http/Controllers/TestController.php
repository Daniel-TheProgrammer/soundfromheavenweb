<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use SevenGps\PayUnit;

class TestController extends Controller
{

    public function login(){
        $user = User::first();
        Auth::login($user);
    }

    public function gettaskquestionswithanswers(){

    }

    public function practise(){

        str1.localeCompare(str2);


        
        return view('test.practise');
    }

    public function payunit(){
        
        
        return view('test.payunit');
    }
}
