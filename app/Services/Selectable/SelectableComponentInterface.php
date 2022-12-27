<?php

namespace App\Services\Selectable;

interface SelectableComponentInterface {
    public function getItems(): array;    
    public function getDefaultSelectedValue(): string;
}

?>