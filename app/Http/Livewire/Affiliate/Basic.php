<?php

namespace App\Http\Livewire\Affiliate;

use App\Models\Affiliate;
use Livewire\Component;

class Basic extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $hashid;

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
     * @var int
     */
    public $commission;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Affiliate $affiliate)
    {
        $this->hashid = $affiliate->hashid;
        $this->name = $affiliate->name;
        $this->username = $affiliate->user->username;
        $this->email = str_contains($affiliate->user->email, 'noemail+') ? null : $affiliate->user->email;
        $this->commission = $affiliate->commission_percentage;
    }

    public function render()
    {
        return view('livewire.affiliate.basic');
    }
}
