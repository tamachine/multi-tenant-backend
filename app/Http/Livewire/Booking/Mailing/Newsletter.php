<?php

namespace App\Http\Livewire\Booking\Mailing;

use App\Exports\NewsletterExport;
use Excel;
use Livewire\Component;

class Newsletter extends Component
{
    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function newsletterExport()
    {
        return Excel::download(new NewsletterExport(), 'Newsletter.xlsx');
    }

    public function render()
    {
        return view('livewire.booking.mailing.newsletter');
    }
}
