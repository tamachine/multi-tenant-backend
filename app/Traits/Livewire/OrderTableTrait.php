<?php

namespace App\Traits\Livewire;

trait OrderTableTrait
{
    /**
     * @var string
     */
    public $order_column = "created_at";

    /**
     * @var string
     */
    public $order_way = "desc";

    public function changeOrder($column)
    {
        if ($this->order_column != $column) {
            $this->order_column = $column;
            $this->order_way = "desc";
        } else {
            $this->order_way = $this->order_way == "desc" ? "asc" : "desc";
        }
    }
}
