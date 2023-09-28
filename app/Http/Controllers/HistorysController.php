<?php

namespace App\Http\Controllers;

use App\Historys;
use App\Reports;
use Illuminate\Http\Request;

class HistorysController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $history = Historys::latest()->paginate(25)->appends(request()->except('page'));
    $hasData = Reports::first();

    return view('history.index', compact('history', 'hasData'));
  }

  public function post()
  {
    return view('history.create');
  }

  public function send(Request $request)
  {
    $validatedData = $request->validate
    ([
       'name_bank' => 'required|min:1|max:225',
    ]);

    Historys::create
    ([
      'name_bank' => $request->name_bank,
      'total' => $request->ammount,
    ]);

    return redirect()->route('history')->with(['success.up' => 'history: '.$request->name_bank.' Added']);
  }

  public function edit($id)
  {
    //$reminder = Reminders::latest()->paginate(25)->appends(request()->except('page'));
    $history = Historys::find($id);

    return view('history.edit', compact('history'));
  }

  public function update(Request $request, $id)
  {
    //dd(1);
    $this->validate($request, [
        'name_bank' => 'required|min:1|max:225',
    ]);

    $history = Historys::findOrFail($id);

    $history->update([
        'name_bank' => $request->name_bank,
        'total' => $request->ammount,
    ]);

    return redirect()->route('history')->with(['success.up' => 'history: '.$request->name_bank.' Edited!']);
  }

  public function delete($id)
  {
    $delete = Historys::findOrFail($id);
    $delete->delete();

    return redirect()->back()->with(['success.down' => $delete->name_bank.' Deleted!']);
  }

  public function massdelete()
  {
    $delete = Historys::truncate();

    return redirect()->back()->with(['success.down' => 'All deleted!']);
  }

}
