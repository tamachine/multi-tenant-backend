<?php

namespace App\Http\Livewire\Admin\ContactUser;

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

    public function mount($contactUser) {

        $this->contactUser = $contactUser->hashid;
        $this->name = $contactUser->name;
        $this->subject = $contactUser->subject;
        $this->email = $contactUser->email;
        $this->type = $contactUser->type;
        $this->message = $contactUser->message;
        $this->created_at = $contactUser->created_at;
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
        
        $this->contactUser->contactuser()->update([
            'email' => $this->email,
            'name' => $this->name
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'The contact user have been saved']);  
    }

    public function render()
    {
        return view('livewire.admin.contact-user.edit');
    }
}
