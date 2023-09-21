<?php

namespace App\Http\Livewire\Booking\ContactUser;

use App\Models\ContactUser;
use App\Models\ContactUserMessage;
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

    public function mount(ContactUserMessage $contactUser) {

        $this->contactUser = $contactUser;
        $this->user = $contactUser->contactuser()->first();

        $this->name = $this->user->name;
        $this->subject = $this->contactUser->subject;
        $this->email = $this->user->email;
        $this->type = $this->contactUser->type;
        $this->message = $this->contactUser->message;
        $this->created_at = $this->contactUser->created_at;
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
        ]);   
        
        $this->user->update([
            'email' => $this->email,
            'name' => $this->name
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'The contact user have been saved']);  
    }

    public function render()
    {
        return view('livewire.booking.contact-user.edit');
    }
}
