<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:owners');
  }

  public function index()
  {
    $owners = Owner::all();

    return view('admin.index', compact('owners'));
  }
}
