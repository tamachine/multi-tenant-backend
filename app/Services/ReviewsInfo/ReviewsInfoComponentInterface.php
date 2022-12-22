<?php

namespace App\Services\ReviewsInfo;

interface ReviewsInfoComponentInterface {
    public function getNote(): float;
    public function getIconPath(): string;
    public function getMobileIconPath(): string;
    public function getTotalReviews(): int;
    public function getMaxNote(): int;
    public function getUrl(): string;
}

?>