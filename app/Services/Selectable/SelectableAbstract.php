<?php

namespace App\Services\Selectable;

abstract class SelectableAbstract
{
    public function getSelectedText($selectedValue): string
    {
        return $this->getItems()[$selectedValue];
    }    
}
?>