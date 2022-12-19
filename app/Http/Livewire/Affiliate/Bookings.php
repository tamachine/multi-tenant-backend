<?php

namespace App\Http\Livewire\Affiliate;

use App\Exports\BookingAffiliatePanelExport;
use App\Models\Affiliate;
use Excel;
use Livewire\Component;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;

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
    public $year;

     /**
     * @var array
     */
    public $years = [];

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $records = 10;

    /**
     * @var string
     */
    public $date_format = "d-m-Y";

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
        $this->fill(request()->only('page'));

        if (app()->environment() == 'testing') {
            return;
        }

        $this->years = $affiliate->bookings()->selectRaw('YEAR(dropoff_at) as year')->distinct()->pluck('year');
    }

    public function excelExport()
    {
        return Excel::download(new BookingAffiliatePanelExport(
            $this->affiliate,
            $this->year,
            $this->status,
            $this->date_format
        ), 'Bookings - ' . $this->affiliate->name .'.xlsx');
    }

    public function render()
    {
        $bookings = $this->affiliate->bookings()->affiliateSearch(
            $this->year,
            $this->status
        )
            ->orderBy('dropoff_at', 'desc')
            ->paginate($this->records);

        return view('livewire.affiliate.bookings', ['bookings' => $bookings]);
    }
}
