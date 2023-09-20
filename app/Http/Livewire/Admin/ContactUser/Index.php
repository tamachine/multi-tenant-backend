<?php

namespace App\Http\Livewire\Admin\ContactUser;

use App\Models\ContactUser;
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
        $contactUsers = ContactUser::join('contact_user_messages as cumessage','contact_users.id','=','cumessage.contact_user_id')
                    ->livewireSearch($this->type, $this->search)
                    ->orderBy('cumessage.created_at','desc')
                    ->paginate(perPage());

        return view('livewire.admin.contact-user.index', ['contactUsers' => $contactUsers]);
    }
}
