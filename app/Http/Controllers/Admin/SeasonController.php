<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\View\View;

class SeasonController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('season.create'),
                'title' => 'Create Season'
            ]),
        ];

        return view('admin.season.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('season.index'),
                'title' => 'Seasons'
            ]),
        ];

        return view('admin.season.create')->with($data);
    }

    public function edit($hashid): View
    {
        $this->authorize('admin');

        $season = Season::where('hashid', $hashid)->firstOrFail();

        $data = [
            'season' => $season,
            'seasonName' => $season->name,
            'action' => collect([
                'route' => route('season.index'),
                'title' => 'Seasons'
            ]),
        ];

        return view('admin.season.edit')->with($data);
    }
}
