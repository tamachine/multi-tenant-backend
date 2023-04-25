<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Extra
     */
    public $extra;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Extra $extra)
    {
        $this->extra = $extra;       
    }
    
    public function render()
    {
        return view('livewire.admin.extra.image');
    }
}
