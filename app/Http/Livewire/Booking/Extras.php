<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Extra;
use Livewire\Component;

class Extras extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

     /**
     * @var App\Models\Booking
     */
    public $booking;

   /**
     * @var array
     */
    public $currentExtras = [];

    /**
     * @var array
     */
    public $availableExtras = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Booking $booking)
    {
        $this->booking = $booking;

        $currentExtras = [];
        $this->currentExtras = [];
        $this->availableExtras = [];

        // Load the current extras
        foreach ($this->booking->bookingExtras->load('extra') as $bookingExtra) {
            $this->currentExtras[] = [
                'id'    => $bookingExtra->extra_id,
                'name'  => $bookingExtra->extra->name,
                'units' => $bookingExtra->units,
            ];
            $currentExtras[] = $bookingExtra->extra_id;
        }

        // Load the available plans (if the bookins is linked to a current car)
        if ($this->booking->car) {
            foreach ($this->booking->car->extras()->orderBy('order_appearance')->get() as $extra) {
                if (!in_array($extra->id, $currentExtras)) {
                    $this->availableExtras[] = [
                        'id'        => $extra->id,
                        'name'      => $extra->name,
                        'selected'  => false,
                        'units'     => 1,
                        'max_units' => $extra->max_units
                    ];
                }
            }
        }
    }

    public function addExtras()
    {
        $added = [];

        foreach($this->availableExtras as $extra) {
            if ($extra["selected"]) {
                $this->booking->bookingExtras()->create([
                    'extra_id'  => $extra["id"],
                    'units'     => $extra["units"],
                ]);

                $added[] = $extra["name"] . " (" . $extra["units"] . ")";
            }
        }

        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Extras added: ' . implode(", ", $added)
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Extras added to the booking');

        return redirect()->route('intranet.booking.edit', ["booking" => $this->booking->hashid, "tab" => "extras"]);
    }

    public function deleteExtra($id)
    {
        $this->booking->bookingExtras()->where('extra_id', $id)->delete();
        $extra = Extra::find($id);

        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Extra deleted: ' . $extra->name
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Extras removed from the booking');

        return redirect()->route('intranet.booking.edit', ["booking" => $this->booking->hashid, "tab" => "extras"]);
    }

    public function render()
    {
        return view('livewire.booking.extras');
    }
}
