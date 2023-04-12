<?php

namespace App\Http\Livewire\Admin\Extra;

use App\Models\Extra;
use Illuminate\Support\Facades\Storage;
use Image as InterventionImage;
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

    /**
     * @var object
     */
    public $image;

     /**
     * @var string
     */
    public $image_url;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Extra $extra)
    {
        $this->extra = $extra;

        $this->image_url = $this->extra->image_url;
    }

    public function uploadImage()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'image'      => ['required', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
        ],
        [
            'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif'
        ]);

        // Delete previous image (if there is one)
        if (!emptyOrNull($this->extra->image)) {
            Storage::disk('public')->delete("extras/" . $this->extra->image);
        }

        $extension = $this->image->getClientOriginalExtension();
        $filename = $this->extra->hashid;
        $this->image->storeAs("public/extras", $filename . "." . $extension);
        InterventionImage::make($this->image)->encode('webp', 80)->save(storage_path() . '/app/public/extras/' . $filename . '.webp');

        $this->extra->update([
            'image' => $filename. "." . $extension,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Image uploaded for ' . $this->extra->name);

        return redirect()->route('intranet.extra.edit', ["extra" => $this->extra->hashid, "tab" => "image"]);
    }

    public function render()
    {
        return view('livewire.admin.extra.image');
    }
}
