<?php

namespace App\Http\Livewire\Affiliate;

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
        if (app()->environment() == 'testing') {
            return;
        }

        $this->pendingThisYear = $affiliate->bookings()->where('status', 'pending')->whereYear('created_at', '=', now()->year)->count();
        $this->pendingAlways = $affiliate->bookings()->where('status', 'pending')->count();
        $this->confirmedThisYear = $affiliate->bookings()->where('status', 'confirmed')->whereYear('created_at', '=', now()->year)->count();
        $this->confirmedAlways = $affiliate->bookings()->where('status', 'confirmed')->count();
        $this->concludedThisYear = $affiliate->bookings()->where('status', 'concluded')->whereYear('created_at', '=', now()->year)->count();
        $this->concludedAlways = $affiliate->bookings()->where('status', 'concluded')->count();
        $this->canceledThisYear = $affiliate->bookings()->where('status', 'canceled')->whereYear('created_at', '=', now()->year)->count();
        $this->canceledAlways = $affiliate->bookings()->where('status', 'canceled')->count();
        $this->totalThisYear = $affiliate->bookings()->whereYear('created_at', '=', now()->year)->count();
        $this->totalAlways = $affiliate->bookings()->count();
    }

    public function render()
    {
        return view('livewire.booking.affiliate.statistics');
    }
}
