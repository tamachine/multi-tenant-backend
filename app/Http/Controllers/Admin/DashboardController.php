<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Statistics;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     *  General Dashboard
     */
    public function index(Statistics $statistics): View
    {
        $this->authorize('scandinavian');

        $data = [
            'statistics' => $statistics->bookingStatistics(),
        ];

        return view('admin.dashboard.index')->with($data);
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
