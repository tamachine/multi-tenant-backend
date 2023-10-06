<?php

namespace App\Http\Livewire\Admin\Rate;

use App\Models\Currency;
use App\Models\CurrencyRate;
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
     * @var App\Models\Currency
     */
    public $currency;

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $symbol;

    /**
     * @var float
     */
    public $value;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Currency $currency)
    {
        $this->currency = $currency;
        $this->fill($currency);
        
        $this->value = $currency->rate->rate;
    }

    public function saveRate()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'code' => ['required', 'unique:currencies,code,' . $this->currency->id],
            'name' => ['required', 'unique:currencies,name,' . $this->currency->id],
            'value' => ['required', 'numeric'],
            'symbol' => ['required', 'max:1'],
        ]);

        $this->currency->update([
            'code' => $this->code,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'rate' => $this->value,
        ]);
        $this->currency->rate->update([
            'rate' => $this->value,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Exchange Rate "' . $this->code .'" edited');

        return redirect()->route('intranet.rate.edit', $this->currency->hashid);
    }

    public function deleteRate()
    {
        $this->currency->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The exchange rate has been deleted'));

        return redirect()->route('intranet.rate.index');
    }

    public function render()
    {
        return view('livewire.admin.rate.edit');
    }
}
