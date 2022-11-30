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
        ];

        return view('admin.caren.index')->with($data);
    }
}
