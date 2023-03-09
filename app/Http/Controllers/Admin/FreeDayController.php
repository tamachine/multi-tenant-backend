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
                'route' => route('intranet.free-day.create'),
                'title' => 'Create Free day plan'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.free-day.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.free-day.index'),
                'title' => 'Free day plans'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Free Day Plans' => route('intranet.caren.index')
            ],
        ];

        return view('admin.free-day.create')->with($data);
    }
}
