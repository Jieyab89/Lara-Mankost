<?php

namespace App\Http\Controllers;

use App\User;
use App\Cashs;
use App\Reports; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
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
        $tot_cash = Cashs::sum('total');
        $cash = Cashs::latest()->paginate(25)->appends(request()->except('page'));

        $hasData = Reports::first();

        return view('cash.index', compact('tot_cash', 'cash', 'hasData'));
    }

    public function post()
    {
        $hasData = Reports::first();
        return view('cash.create', compact('hasData'));
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|min:1|max:75',
            'total' => 'required|min:1|max:75',
        ]);

        Cashs::create
        ([
          'name' => $request->name,
          'total' => $request->total,
        ]);

        return redirect()->route('cash')->with(['success.up' => 'Cash: '.$request->name.' Added']);
    }
    
    public function edit($id)
    {
        $cash = Cashs::find($id);
        $hasData = Reports::first();

        return view('cash.edit', compact('cash', 'hasData'));
    }
  
    public function update(Request $request, $id)
    {
        //dd(1);
        $this->validate($request, [
            'name' => 'required|min:1|max:75|nullable',
            'total' => 'required|min:1|max:75|nullable',
        ]);
  
        $cash = Cashs::findOrFail($id);
    
        $cash->update([
            'name' => $request->name,
            'total' => $request->total,
        ]);
  
        return redirect()->route('cash')->with(['success.up' => 'cash: '.$request->name.' Edited!']);
    }
  
    public function delete($id)
    {
        $delete = Cashs::findOrFail($id);
        $delete->delete();
  
        return redirect()->back()->with(['success.down' => 'success.up: '.$delete->name.' Deleted!']);
    }

    public function massdelete()
    {
        $delete = Cashs::truncate();
  
        return redirect()->back()->with(['success.down' => 'All deleted!']);
    }
}
