<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogPost;

class HomeController extends BaseController
{
    public function index()
    {
        return view('web.home.index', ['latestArticles' => $this->latestArticles()]);
    }

    protected function latestArticles() {
        return BlogPost::published()->orderBy('published_at', 'desc')->take(3)->get();
    }

    protected function footerImagePath() : string
    {
        return '/images/footer/home.png';
    }
}
