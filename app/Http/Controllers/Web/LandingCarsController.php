<?php

namespace App\Http\Controllers\Web;

class LandingCarsController extends BaseController
{

    protected $categories;

    protected $type;

    public function index()
    {
        return view(
            'web.landing-cars.index',
            [
                'categories' => $this->categories,
                'type' => $this->type
            ]
        );
    }

    public function small()
    {
        $this->categories = ['small', 'medium'];
        $this->type = 'small';

        return $this->index();
    }

    public function large()
    {
        $this->categories = ['large'];
        $this->type = 'large';

        return $this->index();
    }

    public function premium()
    {
        $this->categories = ['premium'];
        $this->type = 'premium';

        return $this->index();
    }
    
    protected function footerImagePath() : string
    {
        return '/images/footer/landing-cars.jpg';
    }
}


