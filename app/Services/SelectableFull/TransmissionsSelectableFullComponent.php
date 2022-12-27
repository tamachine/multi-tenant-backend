<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Services\SelectableFull\SelectableFullItem;

class TransmissionsSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {
        return "transmission";
    }      
}
?>