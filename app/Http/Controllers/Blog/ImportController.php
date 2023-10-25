<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use App\Models\ModelImage;
use Illuminate\Http\Request;
use App\Imports\BlogPostsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller
{
    public function index()
    {
        $this->authorize('developer');

        $data = [
            'action' => collect([
                'route' => route('intranet.blog.post.create'),
                'title' => 'Create Post'
            ]),
            'crumbs' => [
                'Blog' => route('intranet.blog.dashboard')
            ]
        ];

        return view('blog.import.index')->with($data);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file')) {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            ModelImage::truncate();
            BlogPost::truncate();

            Excel::import(new BlogPostsImport, $request->file('file'));

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return back()->with('flash', __('Import successful'));
        }
    }
}
