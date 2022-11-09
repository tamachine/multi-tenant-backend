<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\ReviewsInfo\GoogleReviewsInfoComponent;
use App\Services\ReviewsInfo\FacebookReviewsInfoComponent;
use App\Services\ReviewsInfo\TrustPilotReviewsInfoComponent;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index() 
    {        
        return view(
            'web.home.index', 
            [
                'googleReviewInfoComponent' => new GoogleReviewsInfoComponent(),
                'facebookReviewInfoComponent' => new FacebookReviewsInfoComponent(),
                'trustpilotReviewInfoComponent' => new TrustPilotReviewsInfoComponent(),
            ]
        );
    }
}
