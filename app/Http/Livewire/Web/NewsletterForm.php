<?php

namespace App\Http\Livewire\Web;

use App\Mail\ContactNewsletterSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\NewsletterUser;
use App\Traits\Livewire\ModalTrait;

class NewsletterForm extends Component
{
    use ModalTrait;

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

        $newsletter_user = NewsletterUser::updateOrCreate(
            ['email'  => $this->newsletter_email],            
            ['active' => 1]
        );

        $newsletter_user->save();

        $this->reset();
        
        $this->showModal = true;
    }
}
