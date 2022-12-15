<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Models\Affiliate;
use App\Models\User;
use Livewire\Component;

class Create extends Component
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
    public $username;

    /**
     * @var array
     */
    public $email;

    /**
     * @var string
     */
    public $password;

     /**
     * @var int
     */
    public $commission_percentage;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveAffiliate(Affiliate $affiliate, User $user)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['nullable', 'email'],
            'password' => ['required'],
            'commission_percentage' => ['required', 'numeric', 'gt:0']
        ];

        $this->validate($rules);

        // 1. Create the user
        $user = $user->create([
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email ? $this->email : 'noemail+' . now()->timestamp . '@noemail.com',
            'role'      => 'affiliate',
            'password'  => bcrypt($this->password)
        ]);

        // 2. Create the affiliate
        $affiliate = $affiliate->create([
            'name'                  => $this->name,
            'commission_percentage' => $this->commission_percentage,
            'user_id'               => $user->id,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Affiliate "' . $this->name . '" created');

        return redirect()->route('booking.affiliate.edit', $affiliate->hashid);
    }

    public function render()
    {
        return view('livewire.booking.affiliate.create');
    }
}
