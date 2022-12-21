<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use View; 
use App\Services\ReviewsInfo\GoogleReviewsInfoComponent;
use App\Services\ReviewsInfo\FacebookReviewsInfoComponent;
use App\Services\ReviewsInfo\TrustPilotReviewsInfoComponent;
use App\Services\Selectable\CarSearchHoursSelectableComponent;
use App\Services\Breadcrumbs\Breadcrumbs;
use App\Models\CarCategory;

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
        View::share('carCategories', CarCategory::all());
    }

    protected function getBreadcrumb($routes = []) {
        $breadcrumbs = new Breadcrumbs();
        $breadcrumb = [];

        foreach($routes as $route) {
            $breadcrumb[] = $breadcrumbs->getBreadcrumbByRoute($route);
        }

        return $breadcrumb;
    }

    abstract protected function footerImagePath() : string;
}
