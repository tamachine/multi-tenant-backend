<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $search;

    /**
     * @var string
     */
    public $order_column = "name";

    /**
     * @var string
     */
    public $order_way = "asc";

     /**
     * @var array
     */
    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function changeOrder($column)
    {
        if ($this->order_column != $column) {
            $this->order_column = $column;
            $this->order_way = "desc";
        } else {
            $this->order_way = $this->order_way == "desc" ? "asc" : "desc";
        }
    }

    public function render()
    {
        $affiliates = Affiliate::leftJoin('bookings', 'affiliates.id', '=', 'bookings.affiliate_id')
            ->livewireSearch($this->search)
            ->selectRaw('
                affiliates.hashid,
                affiliates.name,
                affiliates.commission_percentage,
                count(bookings.created_at > "' . now()->startOfYear()->format('Y-m-d H:i:s') .'") as total_bookings,
                count(bookings.created_at > "' . now()->startOfYear()->format('Y-m-d H:i:s') .'" and bookings.status = "concluded" or null) as concluded_bookings
            ')
            ->orderBy($this->order_column, $this->order_way)
            ->groupBy('affiliates.hashid', 'affiliates.name', 'affiliates.commission_percentage')
            ->paginate(perPage());

        return view('livewire.booking.affiliate.index', ['affiliates' => $affiliates]);
    }
}
