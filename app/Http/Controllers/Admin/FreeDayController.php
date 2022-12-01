<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FreeDayController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('free-day.create'),
                'title' => 'Create Free day plan'
            ]),
        ];

        return view('admin.free-day.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('free-day.index'),
                'title' => 'Free day plans'
            ]),
        ];

        return view('admin.free-day.create')->with($data);
    }
}
