<?php

namespace App\Http\Livewire\Booking;

use App\Models\Affiliate;
use App\Models\Booking;
use Livewire\Component;

class LinkedAffiliate extends Component
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
    public $affiliates;

    /**
     * @var string
     */
    public $affiliate;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->affiliates = Affiliate::orderBy('name', 'asc')->pluck('name', 'hashid');
    }

    public function addAffiliate(Affiliate $affiliate)
    {
        $affiliate = $affiliate->find(dehash($this->affiliate));

        // Update the booking adding the affiliate's commission
        $this->booking->update([
            'affiliate_id'          => $affiliate->id,
            'affiliate_commission'  => round($this->booking->online_payment * $affiliate->commission_percentage / 100)
        ]);

        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Added affiliate: ' . $affiliate->name
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'The affiliate has been added to the booking.');

        return redirect()->route('intranet.booking.edit', ["booking" => $this->booking->hashid, "tab" => "affiliate"]);
    }

    public function deleteAffiliate($hashid)
    {
        $this->booking->update([
            'affiliate_id' => null,
            'affiliate_commission' => null,
        ]);

        $this->booking->logs()->create([
            'user_id'    => auth()->user()->id,
            'message'    => 'Removed affiliate: ' . $hashid
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'The affiliate has been removed from the booking.');

        return redirect()->route('intranet.booking.edit', ["booking" => $this->booking->hashid, "tab" => "affiliate"]);
    }

    public function render()
    {
        return view('livewire.booking.affiliate');
    }
}
