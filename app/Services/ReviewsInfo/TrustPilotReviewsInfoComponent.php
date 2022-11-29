<?php

namespace App\Services\ReviewsInfo;

use App\Contracts\ReviewsInfoComponent;

class TrustPilotReviewsInfoComponent extends ReviewsInfoAbstract implements ReviewsInfoComponent 
{
    public function getNote(): float
    {
        return 4.6;
    }

    public function getIconPath(): string
    {
        return asset('images/logos/trustpilot.svg');
    }

    public function getMobileIconPath(): string
    {
        return asset('images/logos/trustpilot-icon.svg');
    }
    
    public function getTotalReviews(): int
    {
        return 17;
    }   

    public function getUrl(): string 
    {
        return 'http://www.google.com';
    }
}

?>