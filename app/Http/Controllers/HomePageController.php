<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomePageController extends Controller
{
    public function index()
    {
        $projects = Project::get()->sortBy('created_at')->take(4);

        return view('index')->with('projects', $projects);
    }

    public function download(): BinaryFileResponse
    {
        return response()->download(public_path() . '/cv/' . 'cv.pdf');
    }
}
