<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $Test = Test::firstOrCreate([]);
//         dd($Test);
        
        $Test = Test::create([]);
        $Test->save();
        
        dd($Test);
    }
    
}
