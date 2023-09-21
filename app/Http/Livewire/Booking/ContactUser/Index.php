<?php

namespace App\Http\Livewire\Booking\ContactUser;

use App\Models\ContactUser;
use App\Models\ContactUserMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    /**
     * @var string
     */
    public $type = '';

    /**
     * @var string
     */
    public $search;

    public function render()
    {   
        $contactUsers = ContactUserMessage::livewireSearch($this->type, $this->search)
                    ->orderBy('created_at','desc')
                    ->paginate(perPage());

        return view('livewire.booking.contact-user.index', ['contactUsers' => $contactUsers]);
    }
}
