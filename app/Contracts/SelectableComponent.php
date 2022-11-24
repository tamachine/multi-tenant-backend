<?php

namespace App\Contracts;

interface SelectableComponent {
    public function getItems(): array;    
    public function getDefaultSelectedValue(): string;
}

?>