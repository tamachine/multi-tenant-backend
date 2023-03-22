<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Rate;
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

    public function mount()
    {
        //
    }

    public function saveRate(Rate $rate)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'code'  => ['required', 'unique:rates,code'],
            'name'  => ['required', 'unique:rates,name'],
            'value' => ['required', 'numeric'],
        ];

        $this->validate($rules);

        $rate = $rate->create([
            'code' => $this->code,
            'name' => $this->name,
            'rate' => $this->value,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Exchange Rate "' . $this->code . '" created');

        return redirect()->route('intranet.rate.edit', $rate->id);
    }

    public function render()
    {
        return view('livewire.admin.rate.create');
    }
}
