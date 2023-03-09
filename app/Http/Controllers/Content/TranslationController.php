<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(): View
    {
        $this->authorize('content');      
        
        $data = [                       
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard')
            ]
        ];

        return view('content.translation.index')->with($data);
    }      
    
    public function edit(Translation $translation, Request $request): View
    {
        $this->authorize('content');  

        $data = [      
            'action' => collect([
                'route' => route('intranet.content.translation.index', ['search' => $request->query('search')]),
                'title' => 'Translations'
            ]),                 
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard'),
                'Translations'  => route('intranet.content.translation.index', ['search' => $request->query('search')])
            ],
            'translation' => $translation
        ];

        return view('content.translation.edit')->with($data);
    }
}
