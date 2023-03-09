<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('intranet.blog.category.create'),
                'title' => 'Create Category'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard')
            ]
        ];

        return view('blog.category.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('intranet.blog.category.index'),
                'title' => 'Categories'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard'),
                'Categories' => route('intranet.blog.category.index')
            ],
        ];

        return view('blog.category.create')->with($data);
    }

    public function edit($hashid): View
    {
        $this->authorize('blog');

        $category = BlogCategory::where('hashid', $hashid)->firstOrFail();

        $data = [
            'category' => $category,
            'action' => collect([
                'route' => route('intranet.blog.category.index'),
                'title' => 'Categories'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard'),
                'Categories' => route('intranet.blog.category.index')
            ],
        ];

        return view('blog.category.edit')->with($data);
    }
}
