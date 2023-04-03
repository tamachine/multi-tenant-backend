<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogAuthor;

class BlogSearchAuthorController extends BaseController
{
    public function index(BlogAuthor $blogAuthor) {        
        return view('web.blog.search.author', ['author' => $blogAuthor]);   
    }   

    protected function footerImagePath(): string
    {
        return asset('/images/footer/blog.png');
    }   
}
