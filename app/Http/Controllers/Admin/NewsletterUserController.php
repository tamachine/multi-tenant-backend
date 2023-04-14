<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterUser;
use Illuminate\View\View;

class NewsletterUserController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');        

        $data = [            
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];


        return view('admin.newsletter-user.index')->with($data);
    }

}
