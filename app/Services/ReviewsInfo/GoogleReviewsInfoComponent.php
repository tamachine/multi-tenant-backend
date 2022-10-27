<?php

namespace App\Services\ReviewsInfo;

use App\Contracts\ReviewsInfoComponent;

class GoogleReviewsInfoComponent extends ReviewsInfoAbstract implements ReviewsInfoComponent 
{
    public function getNote(): float
    {
        return 4.7;
    }

    public function getIconPath(): string
    {
        return asset('images/logos/google.svg');
    }
    
    public function getTotalReviews(): int
    {
        return 77;
    }   

    public function getUrl(): string 
    {
        return 'http://www.google.com';
    }
}

?>