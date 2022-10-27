<?php

namespace App\Services\ReviewsInfo;

abstract class ReviewsInfoAbstract
{
    public function getMaxNote(): int
    {
        return 5;
    }

    public function getMarkedStars() : int
    {
        return ceil($this->getNote());
    }

    public function getTotalStars() : int
    {
        return $this->getMaxNote();
    }
}
?>