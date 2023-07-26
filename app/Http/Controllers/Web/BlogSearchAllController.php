<?php

namespace App\Http\Controllers\Web;

class BlogSearchAllController extends BaseController
{
    public function index() {        
        return view('web.blog.search.all');   
    }   

    protected function footerImagePath(): string
    {
        return '/images/footer/blog.png';
    }   
}
