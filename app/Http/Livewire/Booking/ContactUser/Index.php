<?php

namespace App\Http\Livewire\Booking\ContactUser;

use App\Models\ContactUserDetail;
use App\Models\ContactUserDetailsType;
use App\Traits\Livewire\OrderTableTrait;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    use OrderTableTrait;

    /**
     * @var string
     */
    public $type = '';

    /**
     * @var string
     */
    public $search;

    /**
     * @var string
     */
    public $contact_start_date = "";

    /**
     * @var string
     */
    public $contact_end_date = "";

    public function getTypeOptionsProperty()
    {
        return ContactUserDetailsType::get(['hashid','name']);  
    }

    public function render()
    {   
        $contactUsers = ContactUserDetail::livewireSearch($this->type,$this->contact_start_date, $this->contact_end_date, $this->search)
                    ->orderBy($this->order_column, $this->order_way)
                    ->paginate(perPage());

        return view('livewire.booking.contact-user.index', ['contactUsers' => $contactUsers]);
    }
}
