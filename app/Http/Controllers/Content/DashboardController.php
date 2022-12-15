<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     *  General Dashboard
     */
    public function index(): View
    {       
        $this->authorize('content');  
        
        return view('content.dashboard.index');
    }      
}
