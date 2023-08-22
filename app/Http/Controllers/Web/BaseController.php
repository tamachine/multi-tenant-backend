<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use View; 
use App\Services\ReviewsInfo\GoogleReviewsInfoComponent;
use App\Services\ReviewsInfo\FacebookReviewsInfoComponent;
use App\Services\ReviewsInfo\TrustPilotReviewsInfoComponent;
use App\Services\Selectable\CarSearchHoursSelectableComponent;
use App\Models\CarType;

abstract class BaseController extends Controller
{    
    public function __construct() 
    {        
        $this->commonViewParams();
    }

    protected function commonViewParams() {
        View::share('googleReviewInfoComponent', new GoogleReviewsInfoComponent());
        View::share('facebookReviewInfoComponent', new FacebookReviewsInfoComponent());
        View::share('trustpilotReviewInfoComponent', new TrustPilotReviewsInfoComponent());
        View::share('carSearchHoursSelectableComponent', new CarSearchHoursSelectableComponent());

        View::share('footerImagePath', $this->footerImagePath());
        View::share('carCategories', CarType::all());
    }    

    /**
     * This method has to return the asset path for the footer image.
     * Notice only the 'path' not the 'asset('path')
     * @return string
     */
    abstract protected function footerImagePath() : string;
}
