<?php

namespace App\Services\SelectableFull;

interface SelectableFullComponentInterface {
    /**
     * @return SelectableFullItem[]
     */
    public function getItems(): array;    
    
    public function getDefaultSelectedValue(): string;

    public function getTitle(): string;

    public function getIconPath(): ?string;
}

?>