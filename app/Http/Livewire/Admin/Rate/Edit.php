<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Rate;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Rate
     */
    public $rate;

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $value;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Rate $rate)
    {
        $this->rate = $rate;

        $this->code = $this->rate->code;
        $this->name = $this->rate->name;
        $this->value = $this->rate->rate;
    }

    public function saveRate()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'code' => ['required', 'unique:rates,code,' . $this->rate->id],
            'name' => ['required', 'unique:rates,name,' . $this->rate->id],
            'value' => ['required', 'numeric'],
        ]);

        $this->rate->update([
            'code' => $this->code,
            'name' => $this->name,
            'rate' => $this->value,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Exchange Rate "' . $this->code .'" edited');

        return redirect()->route('intranet.rate.edit', $this->rate->id);
    }

    public function deleteRate()
    {
        $this->rate->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The exchange rate has been deleted'));

        return redirect()->route('intranet.rate.index');
    }

    public function render()
    {
        return view('livewire.admin.rate.edit');
    }
}
