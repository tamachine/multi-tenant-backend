<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\View\View;

class ExtraController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('extra.create'),
                'title' => 'Create Extra'
            ]),
        ];

        return view('admin.extra.index')->with($data);
    }

    public function create($caren_extra = null): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('extra.index'),
                'title' => 'Extras'
            ]),
            'caren_extra' => $caren_extra,
        ];

        return view('admin.extra.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $this->authorize('admin');

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
