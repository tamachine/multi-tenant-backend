<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Carbon\Carbon;
use Livewire\Component;

class Holidays extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Vendor
     */
    public $vendor;

    /**
     * @var object
     */
    public $date;

    /**
     * @var int
     */
    public $closed = 0;

    /**
     * @var string
     */
    public $pickup_from = '08:00';

    /**
     * @var string
     */
    public $pickup_to = '23:30';

    /**
     * @var string
     */
    public $dropoff_from = '08:00';

    /**
     * @var string
     */
    public $dropoff_to = '23:30';

    /**
     * @var array
     */
    public $holidays = [];

     /**
     * @var array
     */
    public $hours = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $holidays = $this->vendor->holidays;

        // Load the hours for the dropdowns
        $start = now()->startOfDay();
        $end = now()->endOfDay();

        while($start < $end) {
            $this->hours[] = $start->format('H:i');
            $start->addMinutes(30);
        }

        // Load the vendor's holidays
        foreach ($holidays as $holiday) {
            $this->holidays[] = [
                'id'            => $holiday->id,
                'date'          => $holiday->date->format('d-m-Y'),
                'closed'        => $holiday->closed,
                'pickup_from'   => $holiday->pickup_from->format('H:i'),
                'pickup_to'     => $holiday->pickup_to->format('H:i'),
                'dropoff_from'  => $holiday->pickup_from->format('H:i'),
                'dropoff_to'    => $holiday->pickup_to->format('H:i'),
            ];
        }
    }

    public function addHolidays()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'date' => ['required'],
        ]);

        $this->vendor->holidays()->create([
            'date'          => Carbon::createFromFormat("d-m-Y", $this->date),
            'closed'        => $this->closed,
            'pickup_from'   => $this->pickup_from,
            'pickup_to'     => $this->pickup_to,
            'dropoff_from'  => $this->pickup_from,
            'dropoff_to'    => $this->pickup_to,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Added holidays for ' . $this->vendor->name);

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "holidays"]);
    }

    public function editHolidays($key)
    {
        $holiday = $this->holidays[$key];

        $this->vendor->holidays()->where('id', $holiday['id'])->update([
            'date'          => Carbon::createFromFormat("d-m-Y", $holiday["date"]),
            'closed'        => $holiday["closed"],
            'pickup_from'   => $holiday["pickup_from"],
            'pickup_to'     => $holiday["pickup_to"],
            'dropoff_from'  => $holiday["dropoff_from"],
            'dropoff_to'    => $holiday["dropoff_to"],
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Edited holidays for ' . $this->vendor->name);

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "holidays"]);
    }

    public function deleteHolidays($key)
    {
        $holiday = $this->holidays[$key];

        $this->vendor->holidays()->where('id', $holiday['id'])->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Deleted holidays for ' . $this->vendor->name);

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "holidays"]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.holidays');
    }
}
