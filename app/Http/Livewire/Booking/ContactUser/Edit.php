<?php

namespace App\Http\Livewire\Booking\ContactUser;

use App\Models\ContactUserDetail;
use Livewire\Component;

class Edit extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var model
     */
    public $contactUser;

     /**
     * @var model
     */
    public $user;

    public function mount(ContactUserDetail $contactUser) {

        $this->fill($contactUser);

        $this->user = $contactUser->contactuser()->first();
        $this->email = $this->user->email;

    }

    public function saveContact() {
        
        $this->dispatchBrowserEvent('validationError');
        
        $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);
       
        $this->contactUser->update([
            'type' => $this->type,
            'subject' => $this->subject,
            'message' => $this->message, 
            'name' => $this->name          
        ]);   
        
        $this->user->update([
            'email' => $this->email,
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'The contact user have been saved']);  
    }

    public function render()
    {
        return view('livewire.booking.contact-user.edit');
    }
}
