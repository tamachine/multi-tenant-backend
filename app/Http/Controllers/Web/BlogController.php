<?php

namespace App\Http\Controllers\Web;

use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class BlogController extends BaseController
{

    public function index()
    {
        $blog = BlogPost::with(['author', 'category', 'tags', 'author']);

        return view('web.blog.index', [
                'tags'                  => BlogTag::has('postsPublished')->get(),
                'latest'                => $blog->published()->orderBy('published_at', 'desc')->take(4)->get(),
                'hero'                  => $blog->hero()->published()->orderBy('published_at', 'desc')->take(3)->get(),
                'top'                   => $blog->top()->published()->get(),
                'categoriesWithPosts'   => BlogCategory::has('postsPublished')->paginate(1),
                'breadcrumbs'           => getBreadcrumb(['home', 'blog']),
            ]);
    }

    public function show(BlogPost $blogPost)
    {

        if(!$blogPost->published) {
            abort(404);
        }

        return $this->postView($blogPost);
    }

    public function preview(BlogPost $blogPost)
    {
        if(!Auth::check()) {
            abort(404);
        }

        $this->authorize('blog');

        $blogPost->published_at = now();

        return $this->postView($blogPost);
    }

    protected function postView(BlogPost $blogPost) {
        return view(
            'web.blog.show',
            [
                'post' => $blogPost,
                'breadcrumbs' => getBreadcrumb(['home', 'blog', $blogPost->title]),
                'related' => $blogPost->related_posts
            ]
        );
    }

    protected function footerImagePath(): string
    {
        return '/images/footer/blog.png';
    }
}
