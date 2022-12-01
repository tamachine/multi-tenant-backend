<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     *  General Dashboard
     */
    public function index(): View
    {
        return view('admin.dashboard.index');
    }

    /**
     *  Admin Settings
     */
    public function settings(): View
    {
        $this->authorize('admin');

        return view('admin.dashboard.settings');
    }
}
