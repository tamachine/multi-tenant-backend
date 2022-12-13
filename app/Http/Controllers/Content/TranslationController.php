<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TranslationController extends Controller
{
    public function index(): View
    {
        $this->authorize('content');      
        
        $data = [                       
            'crumbs' => [
                'Content & SEO' => route('content.dashboard')
            ]
        ];

        return view('content.translation.index')->with($data);
    }        
}
