<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CarenController extends Controller
{
    public function index($tab = null): View
    {
        $this->authorize('admin');

        $data = [
            'tab' => emptyOrNull($tab) ? 'vendors' : $tab,
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.caren.index')->with($data);
    }
}
