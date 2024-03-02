<?php

namespace App\Http\Controllers;

use App\User;
use App\Cashs;
use App\Costs;
use App\Saves;
use App\Reports;
use App\Reminders;
use Carbon\Carbon;
use App\Historys;
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
        $tot_saves = Saves::sum('total');
        $tot_strike_cash = Cashs::max('total');
        $tot_strike_cost = Costs::max('total');
        $balance =  $tot_cash - $tot_cost;
        $tot_recap_cost = $balance - $tot_cost;

        $reminder_data = Reminders::get();
        $show = Reports::latest()->paginate(1)->appends(request()->except('page'));
        $hasData = Reports::first();
        $tot_cash_today = Cashs::whereDate('created_at', Carbon::today())->sum('total');
        $tot_cost_today = Costs::whereDate('created_at', Carbon::today())->sum('total');
        $history_data = Historys::get();
        
        /*

        Don't let your balance and savings exceed your daily expenses or total expenses
        Calculate your expenses

        */

        // CHART PIE GRAPH
        $get_totals_pie = $tot_cash + $tot_cost + $tot_saves;
        // END PIE GRAPH

        // CHART CURVE GRAPH 
        $checkpoint_data = $tot_cash + $tot_cost + $tot_saves;
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;
        $start_date = Carbon::createFromDate($current_year, $current_month, 1)->startOfMonth();
        $end_date = $start_date->copy()->endOfMonth();
        $daily_data = [];

        while ($start_date->isSameMonth($end_date)) 
        {
            $cash_data = Cashs::whereDate('created_at', $start_date)->sum('total');
            $cost_data = Costs::whereDate('created_at', $start_date)->sum('total');
            $savings_data = Saves::whereDate('created_at', $start_date)->sum('total');

            $daily_data[$start_date->toDateString()] = 
            [
                'cash' => $cash_data,
                'cost' => $cost_data,
                'saves' => $savings_data
            ];

            $start_date->addDay();
        }
        // END CURVE GRAPH 

        return view('home', compact
        (
            'tot_cash', 'tot_cost', 'balance', 'tot_strike_cash', 'tot_strike_cost',
            'tot_recap_cost', 'tot_saves', 'show', 'hasData', 'tot_cash_today', 'reminder_data',
            'tot_cost_today', 'get_totals_pie', 'history_data', 'checkpoint_data', 'daily_data'
        )
      );
    }

    public function massdelete()
    {
        $delete = Cashs::truncate();
        $delete = Costs::truncate();
        $delete = Saves::truncate();
        $delete = Reports::truncate();
        $delete = Historys::truncate();

        // REMOVE 5 TABLE DATA
        return redirect()->back()->with(['success.down' => 'All deleted!']);
    }
}
