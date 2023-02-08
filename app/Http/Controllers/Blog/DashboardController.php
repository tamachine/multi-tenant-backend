<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     *  General Dashboard
     */
    public function index(): View
    {
        $this->authorize('blog');

        return view('blog.dashboard.index');
    }
}
