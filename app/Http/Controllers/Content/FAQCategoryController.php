<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FAQCategoryController extends Controller
{
    public function index(): View
    {
        $this->authorize('content');      
        
        $data = [       
            'action' => collect([
                'route' => route('intranet.content.faq-category.create'),
                'title' => 'Create FAQ Category'
            ]),                
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard')
            ]
        ];

        return view('content.faq-category.index')->with($data);
    }  
    
    public function create(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.content.faq-category.index'),
                'title' => 'FAQ Categories'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'FAQ Categories' => route('intranet.content.faq-category.index')
            ],
        ];
        
        return view('content.faq-category.create')->with($data);
    }

    public function edit(FaqCategory $faq_category, Request $request): View
    {
        $this->authorize('content');  

        $data = [      
            'action' => collect([
                'route' => route('intranet.content.faq-category.index', ['search' => $request->query('search')]),
                'title' => 'FAQ Categories'
            ]),                 
            'crumbs' => [
                'Content & SEO' => route('intranet.content.dashboard'),
                'FAQ Categories'  => route('intranet.content.faq-category.index', ['search' => $request->query('search')])
            ],
            'faqCategory' => $faq_category
        ];

        return view('content.faq-category.edit')->with($data);
    }
}
