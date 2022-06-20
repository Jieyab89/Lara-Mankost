<?php

namespace App\Http\Controllers;

use App\Costs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('cost.index', compact('tot_cost', 'cost'));
    }

    public function post()
    {
        return view('cost.create');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|min:1|max:75',
            'total' => 'required|min:1|max:25',
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
    
        return view('cost.edit', compact('cost'));
    }
  
    public function update(Request $request, $id)
    {
        //dd(1);
        $this->validate($request, [
            'name' => 'required|min:5|max:75|nullable',
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
}
