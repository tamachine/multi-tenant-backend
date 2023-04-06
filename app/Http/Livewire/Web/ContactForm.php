<?php

namespace App\Http\Livewire\Web;

use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $message;

    public $sent = false;

    protected $listeners = ['emailSent' => 'emailSent'];

     /**
     * @var bool
     */
    public $submitButtonCentered;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(bool $submitButtonCentered = true)
    {
        $this->type = 'general';
        $this->submitButtonCentered = $submitButtonCentered;
    }

    public function render()
    {
        return view('livewire.web.contact-form');
    }

    public function send()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);

        $request = collect();
        $request->put('name', $this->name);
        $request->put('email', $this->email);
        $request->put('subject', $this->subject);
        $request->put('type', __('contact.enquiry_' . $this->type));
        $request->put('message', $this->message);

        Mail::to(config('settings.email.contact'))->send(new ContactFormSubmitted($request));

        $this->name = "";
        $this->email = "";
        $this->subject = "";
        $this->type = "general";
        $this->message = "";

        $this->sent = true;
    }

    public function emailSent()
    {
        $this->sent = false;
    }
}
