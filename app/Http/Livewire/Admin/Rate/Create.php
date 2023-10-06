<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Currency;
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

    /**
     * @var string
     */
    public $symbol;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveRate(Currency $currency)
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'code'  => ['required', 'unique:currencies,code'],
            'name'  => ['required', 'unique:currencies,name'],
            'value' => ['required', 'numeric'],
            'symbol' => ['required','max:1']
        ];

        $this->validate($rules);

        $currency = $currency->create([
            'code' => $this->code,
            'name' => $this->name,
            'symbol' => $this->symbol
        ]);
        
        $currency->rate()->create([
            'rate' => $this->value,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Exchange Rate "' . $this->code . '" created');

        return redirect()->route('intranet.rate.edit', $currency->hashid);
    }

    public function render()
    {
        return view('livewire.admin.rate.create');
    }
}
