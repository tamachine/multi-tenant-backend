<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogCategory;

class BlogSearchCategoryController extends BaseController
{
    public function index(BlogCategory $blogCategory) {        
        return view('web.blog.search.category', ['category' => $blogCategory]);   
    }   

    protected function footerImagePath(): string
    {
        return asset('/images/footer/blog.png');
    }
}
