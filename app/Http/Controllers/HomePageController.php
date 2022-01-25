<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store_file(Request $request)
    {
        $file = $request->file('attachment');
        $file->storeAs('', $file->getClientOriginalName());
    }
}
