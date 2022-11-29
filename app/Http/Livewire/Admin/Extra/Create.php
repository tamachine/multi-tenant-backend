<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
use App\Models\Vendor;
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
    public $vendor;

    /**
     * @var array
     */
    public $vendors;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Vendor $vendor)
    {
        $this->vendors = $vendor->pluck('name', 'hashid');
    }

    public function saveExtra(Extra $extra)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'              => ['required'],
            'vendor'            => ['required'],
        ]);

        $extra = $extra->create([
            'name'              => $this->name,
            'vendor_id'         => dehash($this->vendor),
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Extra "' . $this->name . '" created');

        return redirect()->route('extra.edit', $extra->hashid);
    }

    public function render()
    {
        return view('livewire.admin.extra.create');
    }
}
