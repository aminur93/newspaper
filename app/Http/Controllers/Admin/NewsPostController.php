<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsPostController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }
    
    public function create()
    {
        return view('admin.news.create');
    }
}
