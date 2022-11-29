<?php

namespace App\Observers;

use App\Models\CarenExtra;
use App\Models\Extra;

class ExtraObserver
{
    /**
     * Handle the Extra "created" event.
     * Add the order number
     *
     * @param  \App\Models\Extra  $extra
     * @return void
     */
    public function created(Extra $extra)
    {
        $extra->order_appearance = Extra::where('vendor_id', $extra->vendor_id)->count();
        $extra->save();
    }

    /**
     * Handle the Extra "deleted" event.
     * 1. Remove the Caren Extra linked to it
     * 2. Reorder the elements
     *
     * @param  \App\Models\Extra  $extra
     * @return void
     */
    public function deleted(Extra $extra)
    {
        CarenExtra::where('extra_id', $extra->id)->update(['extra_id' => null]);

        $order = 1;

        foreach (Extra::where('vendor_id', $extra->vendor_id)->orderBy('order_appearance')->get() as $extra) {
            $extra->update(['order_appearance' => $order]);
            $order++;
        }
    }
}
