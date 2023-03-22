<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\CarenExtra;
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

    /**
     * @var array
     */
    public $caren_extras = [];

    /**
     * @var string
     */
    public $caren_extra;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount($caren_extra)
    {
        $this->vendors = Vendor::pluck('name', 'hashid');

        if (config('settings.booking_enabled.caren')) {
            $this->caren_extra = $caren_extra;
            $this->caren_extras = CarenExtra::whereNull('extra_id')->pluck('name', 'id');
        }
    }

    public function saveExtra(Extra $extra)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'name'      => ['required'],
            'vendor'    => ['required'],
        ];

        $this->validate($rules);

        $extra = $extra->create([
            'name'              => $this->name,
            'vendor_id'         => dehash($this->vendor),
        ]);

        if (!empty($this->caren_extra)) {
            $carenExtra = CarenExtra::find($this->caren_extra);
            $carenExtra->update(['location_id' => $extra->id]);

            $extra->update([
                'caren_id' => $carenExtra->caren_id
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Extra "' . $this->name . '" created');

        return redirect()->route('intranet.extra.edit', $extra->hashid);
    }

    public function render()
    {
        return view('livewire.admin.extra.create');
    }
}
