<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Booking;
use Valitor;

class ValitorForm extends Component
{

    public Booking $booking;

    public array $params;

    public string $formAction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;

        $this->params       = Valitor::getParams($this->booking);
        $this->formAction   = Valitor::getFormAction();

        $this->setValitorRequestToBooking();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.valitor-form');
    }

    /**
     * Sets the valitor_request attribute to the booking
     */
    protected function setValitorRequestToBooking() {
        $this->booking->valitor_request = $this->params;
        $this->booking->save();
    }
}
