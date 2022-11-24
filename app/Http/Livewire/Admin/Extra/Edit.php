<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
use Livewire\Component;

class Edit extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Extra
     */
    public $extra;

    /**
     * @var string
     */
    public $vendor;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var bool
     */
    public $active;

    /**
     * @var int
     */
    public $price;

     /**
     * @var int
     */
    public $maximum_fee;

    /**
     * @var int
     */
    public $max_units;

    /**
     * @var string
     */
    public $price_mode;

    /**
     * @var string
     */
    public $category;

    /**
     * @var bool
     */
    public $included;

    /**
     * @var bool
     */
    public $insurance_premium;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Extra $extra)
    {
        $this->extra = $extra;

        $this->vendor = $this->extra->vendor->name;

        $this->name = $this->extra->name;
        $this->description = $this->extra->description;
        $this->active = $this->extra->active;
        $this->price = $this->extra->price;
        $this->maximum_fee = $this->extra->maximum_fee;
        $this->max_units = $this->extra->max_units;
        $this->price_mode = $this->extra->price_mode;
        $this->category = $this->extra->category;
        $this->included = $this->extra->included;
        $this->insurance_premium = $this->extra->insurance_premium;
    }

    public function saveExtra()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'              => ['required'],
            'price'             => ['required', 'numeric', 'gte:0'],
            'maximum_fee'       => ['required', 'numeric', 'gte:0'],
        ]);

        $this->extra->update([
            'name'              => $this->name,
            'description'       => $this->description,
            'active'            => $this->active,
            'price'             => $this->included ? 0 : $this->price,
            'maximum_fee'       => $this->included ? 0 : $this->maximum_fee,
            'max_units'         => $this->max_units,
            'price_mode'        => $this->price_mode,
            'category'          => $this->category,
            'included'          => $this->included,
            'insurance_premium' => $this->insurance_premium
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Extra "' . $this->name . '" edited');

        return redirect()->route('extra.edit', $this->extra->hashid);
    }

    public function deleteExtra()
    {
        $this->extra->delete();

        session()->flash('status', 'success');
        session()->flash('message', __('The extra has been deleted'));

        return redirect()->route('extra.index');
    }

    public function render()
    {
        return view('livewire.admin.extra.edit');
    }
}
