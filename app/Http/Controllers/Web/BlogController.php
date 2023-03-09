<?php

namespace App\Http\Controllers\Web;

class BlogController extends BaseController
{
    public function index()
    {
        return view(
            'web.blog.index'
        );
    }

    protected function footerImagePath(): string
    {
        return 'images/footer/blog.png';
    }
}
