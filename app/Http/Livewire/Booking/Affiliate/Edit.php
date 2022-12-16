<?php

namespace App\Http\Livewire\Booking\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Affiliate
     */
    public $affiliate;

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

    public function mount(Affiliate $affiliate)
    {
        $this->affiliate = $affiliate;
        $this->name = $affiliate->name;
        $this->username = $affiliate->user->username;
        $this->email = str_contains($affiliate->user->email, 'noemail+') ? null : $affiliate->user->email;
        $this->commission_percentage = $affiliate->commission_percentage;
    }

    public function editAffiliate()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['nullable', 'email'],
            'password' => ['nullable'],
            'commission_percentage' => ['required', 'numeric', 'gt:0']
        ];

        $this->validate($rules);

        // 1. Update the user
        $this->affiliate->user->update([
            'name'      => $this->name,
            'username'  => $this->username,
            'email'     => $this->email ? $this->email : 'noemail+' . now()->timestamp . '@noemail.com',
        ]);

        if ($this->password) {
            $this->affiliate->user->update([
                'password'  => bcrypt($this->password)
            ]);
        }

        // 2. Update the affiliate
        $this->affiliate->update([
            'name'                  => $this->name,
            'commission_percentage' => $this->commission_percentage,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Affiliate "' . $this->name . '" updated');

        return redirect()->route('booking.affiliate.edit', $this->affiliate->hashid);
    }

    public function deleteAffiliate()
    {
        $this->affiliate->user->delete();
        $this->affiliate->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The affiliate has been deleted'));

        return redirect()->route('booking.affiliate.index');
    }

    public function render()
    {
        return view('livewire.booking.affiliate.edit');
    }
}
