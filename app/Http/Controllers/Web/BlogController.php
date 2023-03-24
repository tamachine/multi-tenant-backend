<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends BaseController
{
    
    public function index()
    {
        return view(
            'web.blog.index',
            [
                'categories' => BlogCategory::has('postsPublished')->get(),
                'latest' => BlogPost::published()->orderBy('published_at', 'desc')->take(3)->get(),
                'hero' => BlogPost::hero()->published()->get(), 
                'top' => BlogPost::top()->published()->get(),
                'breadcrumbs' => $this->getBreadcrumb(['home', 'blog']),
                'categoriesWithPosts' => BlogCategory::has('postsPublished')->paginate(1)
            ]
        );
    }

    protected function footerImagePath(): string
    {
        return 'images/footer/blog.png';
    }
}
