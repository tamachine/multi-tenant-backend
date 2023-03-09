<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $this->authorize('superAdmin');

        $data = [
            'action' => collect([
                'route' => route('intranet.user.create'),
                'title' => 'Create Intranet user'
            ]),
        ];

        return view('admin.user.index')->with($data);
    }

    public function create(): View
    {
        $this->authorize('superAdmin');

        $data = [
            'action' => collect([
                'route' => route('intranet.user.index'),
                'title' => 'Intranet users'
            ]),
            'crumbs' => [
                'Intranet users' => route('intranet.user.index')
            ],
        ];

        return view('admin.user.create')->with($data);
    }
}
