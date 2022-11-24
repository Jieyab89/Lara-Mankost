<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
  public function index()
  {
    return view('docs.index');
  }

  public function update_mankost()
  {
    return view('docs.update');
  }

  public function contrib_mankost()
  {
    return view('docs.contrib');
  }

  public function make_cash()
  {
    return view('docs.add-cash');
  }

  public function make_cost()
  {
    return view('docs.add-cost');
  }

  public function symbol_icon()
  {
    return view('docs.symbol');
  }

}
