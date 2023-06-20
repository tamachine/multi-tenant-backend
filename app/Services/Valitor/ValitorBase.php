<?php

namespace App\Services\Valitor;

trait ValitorBase
{
    protected array $valitorConfig;

    public function setValitorConfig() {
        $this->valitorConfig = config('valitor');
    }
}

