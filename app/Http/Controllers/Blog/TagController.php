<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('intranet.blog.tag.create'),
                'title' => 'Create Tag'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard')
            ]
        ];

        return view('blog.tag.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('blog');

        $data = [
            'action' => collect([
                'route' => route('intranet.blog.tag.index'),
                'title' => 'Tags'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard'),
                'Tags' => route('intranet.blog.tag.index')
            ],
        ];

        return view('blog.tag.create')->with($data);
    }

    public function edit($hashid): View
    {
        $this->authorize('blog');

        $tag = BlogTag::where('hashid', $hashid)->firstOrFail();

        $data = [
            'tag' => $tag,
            'action' => collect([
                'route' => route('intranet.blog.tag.index'),
                'title' => 'Tags'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard'),
                'Tags' => route('intranet.blog.tag.index')
            ],
        ];

        return view('blog.tag.edit')->with($data);
    }
}
