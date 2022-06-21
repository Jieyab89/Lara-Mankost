<?php

namespace App\Http\Controllers;

use App\User;
use App\Cashs;

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
        return view('cash.index', compact('tot_cash', 'cash'));
    }

    public function post()
    {
        return view('cash.create');
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
    
        return view('cash.edit', compact('cash'));
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
