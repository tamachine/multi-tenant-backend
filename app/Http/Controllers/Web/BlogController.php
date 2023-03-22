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
                'categories' => $this->getCategories(),
                'latest' => BlogPost::published()->get(),
                'featured' => BlogPost::published()->get()->take(3), 
                'breadcrumbs' => $this->getBreadcrumb(['home', 'blog']),
                'categoriesWithPosts' => BlogCategory::has('postsPublished')->paginate(1)
            ]
        );
    }

    protected function footerImagePath(): string
    {
        return 'images/footer/blog.png';
    }

    protected function getCategories() {
        $categories = BlogCategory::all();
        $colors   = ['#EEF8FD', '#EEFDF0', '#FDEEF4', '#F9EEFD', '#EEFDFD', '#FDFCEE']; //if adding colors here, you must add them as well to tailwind.config.js file in safelist array
        $bgColors = ['#d1ecfa', '#d1fad7', '#fad1e1', '#efd1fa', '#d1fafa', '#faf7d1']; //if adding colors here, you must add them as well to tailwind.config.js file in safelist array
        $i = 0;

        foreach($categories as $category) {
            $category->color    = $colors[$i];
            $category->bgColor  = $bgColors[$i];
            if($i == count($colors) -1) $i = 0;
            else $i++;
        }

        return $categories;
    }
    
}
