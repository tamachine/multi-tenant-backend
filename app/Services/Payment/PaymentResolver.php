<?php

namespace App\Services\Payment;

use Valitor;

class PaymentResolver {
    
    /**
     * For now it returns always valitor but maybe another tenant uses another kind/kinds of payment
     * @return array 
     */
    public function getPaymentClasses(): array {
        
        return [
            Valitor::class
        ];
            
    }
}
