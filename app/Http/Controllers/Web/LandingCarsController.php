<?php

namespace App\Http\Controllers\Web;

class LandingCarsController extends BaseController
{

    protected $categories;

    public function index()
    {
        return view(
            'web.landing-cars.index',
            [
                'categories' => $this->categories
            ]
        );
    }

    public function small()
    {
        $this->categories = ['small', 'medium'];

        return $this->index();
    }

    public function large()
    {
        $this->categories = ['large'];

        return $this->index();
    }

    public function premium()
    {
        $this->categories = ['premium'];

        return $this->index();
    }
    
    protected function footerImagePath() : string
    {
        return asset('/images/footer/terms.jpg');
    }
}


