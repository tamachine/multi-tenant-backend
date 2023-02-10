<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;

class ChooseInsurance extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $buttonClass;

    /**
     * @var object
     */
    public $insurance;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount($buttonClass, $insurance)
    {
        $this->buttonClass = $buttonClass;
        $this->insurance = $insurance;
    }

    public function selectInsurance()
    {
        $sessionData = request()->session()->get('booking_data');
        $sessionData['insurances'][] = [
            'id'        => $this->insurance->hashid,
            'name'      => $this->insurance->name,
            'caren_id'  => $this->insurance->caren_id,
            'price'     => $this->insurance->price * bookingDays()
        ];
        request()->session()->put('booking_data', $sessionData);

        return redirect()->route('extras', $sessionData['car']);
    }

    public function render()
    {
        return view('livewire.web.choose-insurance');
    }
}
