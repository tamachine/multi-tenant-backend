<?php

namespace App\Http\Livewire\Web;

use App\Mail\ContactNewsletterSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewsletterForm extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $newsletter_email;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.web.newsletter-form');
    }

    public function send()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'newsletter_email'  => ['required', 'email'],
        ]);

        $request = collect();
        $request->put('email', $this->newsletter_email);

        Mail::to(config('settings.email.newsletter'))->send(new ContactNewsletterSubmitted($request));

        $this->newsletter_email = "";

        $this->dispatchBrowserEvent('goToTop');
        $this->dispatchBrowserEvent('open-success', ['message' => __('contact.newsletter_subscribed')]);
    }
}
