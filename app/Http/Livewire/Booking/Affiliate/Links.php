<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;

class Links extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Affiliate
     */
    public $affiliate;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
    }

    public function render()
    {
        return view('livewire.booking.affiliate.links');
    }
}
