<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function index()
    {
        $attachment = Attachment::find(1);

        return view('index')->with('attachment', $attachment);
    }

    public function store_file(Request $request)
    {
        $file = $request->file('attachment');
        $file->storeAs('', $file->getClientOriginalName());
    }
}
