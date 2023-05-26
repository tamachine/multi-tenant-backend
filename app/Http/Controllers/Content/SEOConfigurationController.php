<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\SeoConfiguration;
use Illuminate\Http\Request;

class SEOConfigurationController extends Controller
{
    public function index(): View
    {
        $this->authorize('content');      
        
        $data = [                                  
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard')
            ]
        ];

        return view('content.seo-configuration.index')->with($data);
    }         

    public function edit(SeoConfiguration $SEOconfiguration, Request $request): View
    {
        $this->authorize('content');  

        $data = [      
            'action' => collect([
                'route' => route('intranet.content.seo-configuration.index', ['search' => $request->query('search')]),
                'title' => 'SEO Configurations'
            ]),                 
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard'),
                'SEO Configurations'  => route('intranet.content.seo-configuration.index', ['search' => $request->query('search')])
            ],
            'SEOconfiguration' => $SEOconfiguration
        ];

        return view('content.seo-configuration.edit')->with($data);
    }
}
