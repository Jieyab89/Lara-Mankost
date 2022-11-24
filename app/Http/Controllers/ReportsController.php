<?php

namespace App\Http\Controllers;

use App\Reports;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $show = Reports::get();
        $hasData = Reports::first();

        return view('report.index', compact('show', 'hasData'));
    }

    public function post()
    {
        return view('report.create');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name' => 'required|min:1|max:75',
            'report_at' => 'required|date',
        ]);

        Reports::create
        ([
          'name' => $request->name,
          'report_at' => $request->report_at,
        ]);

        return redirect()->route('report')->with(['success.up' => 'cost: '.$request->name.' Added']);
    }

    public function delete($id)
    {
        $delete = Reports::findOrFail($id);
        $delete->delete();

        return redirect()->back()->with(['success.down' => 'success.up: '.$delete->name.' Deleted!']);
    }
}
