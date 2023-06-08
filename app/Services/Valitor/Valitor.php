<?php

namespace App\Services\Valitor;

class Valitor {

    public function getParams($booking) {
        $params = new ValitorParams($booking);
        return $params->getParams();        
    }

    public function getFormAction() {
        return config('valitor.url');
    }
}