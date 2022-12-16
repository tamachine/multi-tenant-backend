<?php

namespace App\Exports;

use App\Models\Affiliate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookingAffiliatePanelExport implements FromView
{
    /**
     * @var object
     */
    protected $bookings;

    /**
     * @var \App\Models\Affiliate
     */
    public $affiliate;

    /**
     * @var int
     */
    public $year;

    /**
     * @var string
     */
    public $status = "";

    /**
     * @var string
     */
    public $date_format = "d-m-Y";

    /**
     * @param      object  $affiliate   \App\Models\Affiliate
     * @param      string  $year
     * @param      string  $status
     * @param      string  $date_format
     */
    public function __construct(
        $affiliate,
        $year,
        $status,
        $date_format
    ) {
        $this->affiliate = $affiliate;
        $this->year = $year;
        $this->status = $status;
        $this->date_format = $date_format;

        $this->bookings = $this->affiliate->bookings()->affiliateSearch(
            $this->year,
            $this->status,
        )
            ->orderBy('dropoff_at', 'desc')
            ->get();
    }

    public function view(): View
    {
        return view('exports.booking.affiliate-panel', ['bookings' => $this->bookings, 'date_format' => $this->date_format]);
    }
}
