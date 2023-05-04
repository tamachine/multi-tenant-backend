<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogTag;

class BlogSearchTagController extends BaseController
{
    public function index(BlogTag $blogTag) {        
        return view('web.blog.search.tag', ['tag' => $blogTag]);   
    }   

    protected function footerImagePath(): string
    {
        return '/images/footer/blog.png';
    }   

}
