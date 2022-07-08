<?php

namespace App\Http\Controllers;

use App\Costs;
use App\Reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CostController extends Controller
{
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
        $tot_cost = Costs::sum('total');
        $cost = Costs::latest()->paginate(25)->appends(request()->except('page'));
        $hasData = Reports::first();

        return view('cost.index', compact('tot_cost', 'cost', 'hasData'));
    }

    public function today()
    {
        $today = Costs::whereDate('created_at', Carbon::today())->paginate(25)->appends(request()->except('page'));
        $hasData = Reports::first();
        $tot_cost_today = Costs::whereDate('created_at', Carbon::today())->sum('total');

        return view('cost.today', compact('today', 'hasData', 'tot_cost_today'));
    }

    public function post()
    {
        $hasData = Reports::first();

        return view('cost.create', compact('hasData'));
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|min:1|max:75',
            'total' => 'required|min:1|max:75',
        ]);

        Costs::create
        ([
          'name' => $request->name,
          'total' => $request->total,
        ]);

        return redirect()->route('cost')->with(['success.up' => 'cost: '.$request->name.' Added']);
    }
    
    public function edit($id)
    {
        $cost = Costs::find($id);
        $hasData = Reports::first();

        return view('cost.edit', compact('cost', 'hasData'));
    }
  
    public function update(Request $request, $id)
    {
        //dd(1);
        $this->validate($request, [
            'name' => 'required|min:1|max:75|nullable',
            'total' => 'required|min:1|max:75|nullable',
        ]);
  
        $cost = Costs::findOrFail($id);
    
        $cost->update([
            'name' => $request->name,
            'total' => $request->total,
        ]);
  
        return redirect()->route('cost')->with(['success.up' => 'cost: '.$request->name.' Edited!']);
    }
  
    public function delete($id)
    {
        $delete = Costs::findOrFail($id);
        $delete->delete();
  
        return redirect()->back()->with(['success.down' => 'success.up: '.$delete->name.' Deleted!']);
    }

    public function massdelete()
    {
        $delete = Costs::truncate();
  
        return redirect()->back()->with(['success.down' => 'All deleted!']);
    }
}
