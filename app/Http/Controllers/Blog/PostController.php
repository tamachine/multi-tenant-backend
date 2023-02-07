<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('blog.post.create'),
                'title' => 'Create Post'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard')
            ]
        ];

        return view('blog.post.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('blog.post.index'),
                'title' => 'Posts'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard'),
                'Posts' => route('blog.post.index')
            ],
        ];

        return view('blog.post.create')->with($data);
    }

    public function edit($hashid): View
    {
        $this->authorize('blog');

        $post = BlogPost::where('hashid', $hashid)->firstOrFail();

        $data = [
            'post' => $post,
            'action' => collect([
                'route' => route('blog.post.index'),
                'title' => 'Posts'
            ]),
            'crumbs' => [
                'Blog' => route('blog.dashboard'),
                'Posts' => route('blog.post.index')
            ],
        ];

        return view('blog.post.edit')->with($data);
    }
}
