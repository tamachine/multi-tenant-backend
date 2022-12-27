<?php

namespace App\Services\ReviewsInfo;

use App\Services\ReviewsInfo\ReviewsInfoComponentInterface;

class FacebookReviewsInfoComponent extends ReviewsInfoAbstract implements ReviewsInfoComponentInterface 
{
    public function getNote(): float
    {
        return 4.7;
    }

    public function getIconPath(): string
    {
        return asset('images/logos/facebook.svg');
    }

    public function getMobileIconPath(): string
    {
        return asset('images/logos/facebook-icon.svg');
    }
    
    public function getTotalReviews(): int
    {
        return 14;
    }   

    public function getUrl(): string 
    {
        return 'http://www.google.com';
    }
}

?>