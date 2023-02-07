<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogAuthor;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('blog.author.create'),
                'title' => 'Create Author'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard')
            ]
        ];

        return view('blog.author.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('blog.author.index'),
                'title' => 'Authors'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard'),
                'Authors' => route('blog.author.index')
            ],
        ];

        return view('blog.author.create')->with($data);
    }

    public function edit($hashid): View
    {
        $this->authorize('blog');

        $author = BlogAuthor::where('hashid', $hashid)->firstOrFail();

        $data = [
            'author' => $author,
            'action' => collect([
                'route' => route('blog.author.index'),
                'title' => 'Authors'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard'),
                'Authors' => route('blog.author.index')
            ],
        ];

        return view('blog.author.edit')->with($data);
    }
}
