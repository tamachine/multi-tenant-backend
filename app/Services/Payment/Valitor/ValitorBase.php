<?php

namespace App\Services\Payment\Valitor;

trait ValitorBase
{
    protected array $valitorConfig;

    public function setValitorConfig() {
        $this->valitorConfig = config('valitor');
    }
}

