<?php

namespace App\Http\Controllers;

use App\User;
use App\Cashs;
use App\Costs;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $tot_cash = Cashs::sum('total');
        $tot_cost = Costs::sum('total');
        $tot_strike_cash = Cashs::max('total');
        $tot_strike_cost = Costs::max('total');
        $balance =  $tot_cash - $tot_cost;
        
        return view('home', compact('tot_cash', 'tot_cost', 'balance', 'tot_strike_cash', 'tot_strike_cost'));
    }
}
