<?php

namespace App\Http\Controllers\Developer\Api;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ApiController extends Controller
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

        return view('developer.api.index')->with($data);
    }   
}
