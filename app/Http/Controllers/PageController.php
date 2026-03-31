<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $aboutPage = Page::getBySlug('about');
        return view('pages.about', compact('aboutPage'));
    }

    public function contact()
    {
        $contactPage = Page::getBySlug('contact');
        return view('pages.contact', compact('contactPage'));
    }
}
