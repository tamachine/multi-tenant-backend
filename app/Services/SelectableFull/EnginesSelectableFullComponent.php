<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Services\SelectableFull\SelectableFullItem;

class EnginesSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {
        return "engine";
    }      
}
?>