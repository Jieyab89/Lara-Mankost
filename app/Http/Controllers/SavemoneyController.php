<?php

namespace App\Http\Controllers;

use App\Saves;
use Illuminate\Http\Request;

class SavemoneyController extends Controller
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
        $tot_savesmon = Saves::sum('total');
        $saves = Saves::latest()->paginate(1)->appends(request()->except('page'));
        $hasData = Saves::first();

        return view('saves.index', compact('tot_savesmon', 'saves', 'hasData'));
    }

    public function post()
    {
        return view('saves.create');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|min:1|max:75',
            'total' => 'required|min:1|max:75',
        ]);

        Saves::create
        ([
          'name' => $request->name,
          'total' => $request->total,
        ]);

        return redirect()->route('saves')->with(['success.up' => 'cost: '.$request->name.' Added']);
    }
    
    public function edit($id)
    {
        $saves = Saves::find($id);
    
        return view('saves.edit', compact('saves'));
    }
  
    public function update(Request $request, $id)
    {
        //dd(1);
        $this->validate($request, [
            'name' => 'required|min:1|max:75|nullable',
            'total' => 'required|min:1|max:75|nullable',
        ]);
  
        $saves = Saves::findOrFail($id);
    
        $saves->update([
            'name' => $request->name,
            'total' => $request->total,
        ]);
  
        return redirect()->route('saves')->with(['success.up' => 'saves: '.$request->name.' Edited!']);
    }
  
    public function delete($id)
    {
        $delete = Saves::findOrFail($id);
        $delete->delete();
  
        return redirect()->back()->with(['success.down' => 'success.up: '.$delete->name.' Deleted!']);
    }
}
