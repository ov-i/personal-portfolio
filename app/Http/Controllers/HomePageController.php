<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Category;
use App\Models\Project;
use App\Models\Testimonial;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomePageController extends Controller
{
    public function index()
    {
        $projects = Project::get()->sortBy('created_at')->take(4);
        $about_me = AboutMe::find(1);
        $testimonials = Testimonial::get();
        $categories = Category::get()->sortBy('created_at')->take(4);

        return view('index', compact([
            'projects',
            'about_me',
            'testimonials',
            'categories',
        ]));
    }

    public function download(): BinaryFileResponse
    {
        $aboutMe = AboutMe::find(1);
        return response()->download(public_path() . '/' . $aboutMe->cv_url);
    }
}
