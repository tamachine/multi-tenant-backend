<?php

namespace App\Http\Controllers\Web;

class BlogSearchTop10Controller extends BaseController
{
    public function index() {        
        return view('web.blog.search.top10');   
    }   

    protected function footerImagePath(): string
    {
        return '/images/footer/blog.png';
    }   
}
