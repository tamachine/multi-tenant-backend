<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\View\View;

class ExtraController extends Controller
{
    public function index(): View
    {
        $data = [
            'action' => collect([
                'route' => route('extra.create'),
                'title' => 'Create Extra'
            ]),
        ];

        return view('admin.extra.index')->with($data);
    }

    public function create(): View
    {
        $data = [
            'action' => collect([
                'route' => route('extra.index'),
                'title' => 'Extras'
            ]),
        ];

        return view('admin.extra.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $extra = Extra::where('hashid', $hashid)->firstOrFail();

        $data = [
            'extra' => $extra,
            'extraName' => $extra->name,
            'action' => collect([
                'route' => route('extra.index'),
                'title' => 'Extras'
            ]),
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.extra.edit')->with($data);
    }
}
