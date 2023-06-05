<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View
    {
        $this->authorize('content');      
        
        $data = [                                  
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard')
            ]
        ];

        return view('content.page.index')->with($data);
    }         

    public function edit(Page $page, Request $request): View
    {
        $this->authorize('content');  

        $data = [      
            'action' => collect([
                'route' => route('intranet.content.page.index', ['search' => $request->query('search')]),
                'title' => 'Page configurations'
            ]),                 
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard'),
                'Page configurations'  => route('intranet.content.page.index', ['search' => $request->query('search')])
            ],
            'page' => $page,            
        ];

        return view('content.page.edit')->with($data);
    }
}
