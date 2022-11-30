<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('developer');

        $data = [
            'action' => collect([
                'route' => route('developer.user.create'),
                'title' => 'Create developer user'
            ]),
        ];

        return view('developer.user.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('developer');

        $data = [
            'action' => collect([
                'route' => route('developer.user.index'),
                'title' => 'Developer users'
            ]),
        ];

        return view('developer.user.create')->with($data);
    }
}
