<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.statistics.index')->with($data);
    }
}
