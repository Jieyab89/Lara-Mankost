<?php

namespace App\Http\Controllers;
use App\Reminders;

use Illuminate\Http\Request;

class ReminderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $reminder = Reminders::latest()->paginate(25)->appends(request()->except('page'));

    return view('reminder.index', compact('reminder'));
  }

  public function post()
  {
    return view('reminder.create');
  }

  public function send(Request $request)
  {
    $validatedData = $request->validate
    ([
       'remind_name' => 'required|min:1|max:225',
    ]);

    Reminders::create
    ([
      'remind_name' => $request->remind_name,
    ]);

    return redirect()->route('reminders')->with(['success.up' => 'reminders: '.$request->remind_name.' Added']);
  }

  public function edit($id)
  {
    //$reminder = Reminders::latest()->paginate(25)->appends(request()->except('page'));
    $reminder = Reminders::find($id);

    return view('reminder.edit', compact('reminder'));
  }

  public function update(Request $request, $id)
  {
    //dd(1);
    $this->validate($request, [
        'remind_name' => 'required|min:1|max:225',
    ]);

    $reminder = Reminders::findOrFail($id);

    $reminder->update([
        'remind_name' => $request->remind_name,
    ]);

    return redirect()->route('reminders')->with(['success.up' => 'Reminder: '.$request->remind_name.' Edited!']);
  }

  public function delete($id)
  {
    $delete = Reminders::findOrFail($id);
    $delete->delete();

    return redirect()->back()->with(['success.down' => 'success.up: '.$delete->remind_name.' Deleted!']);
  }

  public function massdelete()
  {
    $delete = Reminders::truncate();

    return redirect()->back()->with(['success.down' => 'All deleted!']);
  }

}
