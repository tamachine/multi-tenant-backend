<?php

namespace App\Http\Controllers\Web;

class LandingCarsController extends BaseController
{

    protected $categories;

    protected $type;

    protected $otherlandings = [];

    public function index()
    {
        return view(
            'web.landing-cars.index',
            [
                'categories' => $this->categories,
                'type' => $this->type,
                'otherlandings' => $this->otherlandings
            ]
        );
    }

    public function small()
    {
        $this->categories = ['small', 'medium'];
        $this->type = 'small';
        $this->otherlandings = [
            [
                'type' => 'large',
                'route' => route('cars.large'),
                'image' => 'images/landing-cars/large-cars_mb.jpg'
            ],
            [
                'type' => 'premium',
                'route' => route('cars.premium'),
                'image' => 'images/landing-cars/premium-cars_mb.jpg'
            ]
        ];

        return $this->index();
    }

    public function large()
    {
        $this->categories = ['large'];
        $this->type = 'large';
        $this->otherlandings = [
            [
                'type' => 'small',
                'route' => route('cars.small'),
                'image' => 'images/landing-cars/small-cars_mb.jpg'
            ],
            [
                'type' => 'premium',
                'route' => route('cars.premium'),
                'image' => 'images/landing-cars/premium-cars_mb.jpg'
            ]
        ];

        return $this->index();
    }

    public function premium()
    {
        $this->categories = ['premium'];
        $this->type = 'premium';
        $this->otherlandings = [
            [
                'type' => 'small',
                'route' => route('cars.small'),
                'image' => 'images/landing-cars/small-cars_mb.jpg'
            ],
            [
                'type' => 'large',
                'route' => route('cars.large'),
                'image' => 'images/landing-cars/large-cars_mb.jpg'
            ]
        ];

        return $this->index();
    }
    
    protected function footerImagePath() : string
    {
        return asset('/images/footer/landing-cars.jpg');
    }
}


