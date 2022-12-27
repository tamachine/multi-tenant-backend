<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Services\SelectableFull\SelectableFullItem;

class SeatsSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {
        return "seat";
    }      
}
?>