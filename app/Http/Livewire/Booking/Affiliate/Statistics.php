<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;

class Statistics extends Component
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

    /**
     * @var int
     */
    public $pendingThisYear;

    /**
     * @var int
     */
    public $pendingAlways;

    /**
     * @var int
     */
    public $confirmedThisYear;

    /**
     * @var int
     */
    public $confirmedAlways;

    /**
     * @var int
     */
    public $concludedThisYear;

    /**
     * @var int
     */
    public $concludedAlways;

    /**
     * @var int
     */
    public $canceledThisYear;

    /**
     * @var int
     */
    public $canceledAlways;

    /**
     * @var int
     */
    public $totalThisYear;

    /**
     * @var int
     */
    public $totalAlways;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
        $bookings = $this->affiliate->bookings();

        $this->pendingThisYear = $this->affiliate->bookings()->where('status', 'pending')->whereYear('created_at', '=', now()->year)->count();
        $this->pendingAlways = $this->affiliate->bookings()->where('status', 'pending')->count();
        $this->confirmedThisYear = $this->affiliate->bookings()->where('status', 'confirmed')->whereYear('created_at', '=', now()->year)->count();
        $this->confirmedAlways = $this->affiliate->bookings()->where('status', 'confirmed')->count();
        $this->concludedThisYear = $this->affiliate->bookings()->where('status', 'concluded')->whereYear('created_at', '=', now()->year)->count();
        $this->concludedAlways = $this->affiliate->bookings()->where('status', 'concluded')->count();
        $this->canceledThisYear = $this->affiliate->bookings()->where('status', 'canceled')->whereYear('created_at', '=', now()->year)->count();
        $this->canceledAlways = $this->affiliate->bookings()->where('status', 'canceled')->count();
        $this->totalThisYear = $this->affiliate->bookings()->whereYear('created_at', '=', now()->year)->count();
        $this->totalAlways = $this->affiliate->bookings()->count();
    }

    public function render()
    {
        return view('livewire.booking.affiliate.statistics');
    }
}
