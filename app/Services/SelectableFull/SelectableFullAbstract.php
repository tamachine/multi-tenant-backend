<?php

namespace App\Services\SelectableFull;

abstract class SelectableFullAbstract
{
    public function getSelectedItem($selectedValue): SelectableFullItem
    {        
        return $this->getItems()[$selectedValue];
    }        

    public function getAllItemValue() {
        return 'all';
    }

    protected function getItem($text, $value) {
        $item = new SelectableFullItem();
        $item->text = $text;
        $item->value = $value;        

        return $item;
    }    

    protected function addAllItem(&$items, $translationPath = 'cars.filters-all') {
        $allItem = $this->getItem(__($translationPath), $this->getAllItemValue());

        $items = [$allItem->value => $allItem] + $items;
    }    
}
?>