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

    /**
     *  Booking Dashboard
     */
    public function bookings(): View
    {
        $this->authorize('booking');

        return view('admin.dashboard.bookings');
    }

    /**
     *  Content Dashboard
     */
    public function content(): View
    {
        $this->authorize('content');

        return view('admin.dashboard.content');
    }
}
