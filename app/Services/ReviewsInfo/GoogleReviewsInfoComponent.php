<?php

namespace App\Services\ReviewsInfo;

use App\Services\ReviewsInfo\ReviewsInfoComponentInterface;

class GoogleReviewsInfoComponent extends ReviewsInfoAbstract implements ReviewsInfoComponentInterface 
{
    public function getNote(): float
    {
        return 4.7;
    }

    public function getIconPath(): string
    {
        return asset('images/logos/google.svg');
    }

    public function getMobileIconPath(): string
    {
        return asset('images/logos/google-icon.svg');
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