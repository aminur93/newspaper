<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboradController extends Controller
{
    public function index()
    {
        return view('editor.dashboard');
    }
}
