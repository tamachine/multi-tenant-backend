<?php

namespace App\Contracts;

interface ReviewsInfoComponent {
    public function getNote(): float;
    public function getIconPath(): string;
    public function getTotalReviews(): int;
    public function getMaxNote(): int;
    public function getUrl(): string;
}

?>