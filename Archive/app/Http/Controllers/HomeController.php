<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	//$this->middleware('auth',['except' => array('metadata','privacyview')]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
    public function competition(){
        return view ('competition');
    }
    public function contactus(){
        return view ('contactus');
    }
    public function contestant(){
        return view ('contestants');
    }
    public function gallery(){
        return view ('gallery');
    }
    public function tracks(){
        return view ('tracks');
    }

    public function tickets(){
        return view ('tickets');
    }
    
}
