<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Image as InterventionImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Car
     */
    public $car;

    /**
     * @var array
     */
    public $current = [];

    /**
     * @var array
     */
    public $images = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car)
    {
        $this->car = $car;

        $this->images[] = null;
        $this->reloadCurrentImages();
    }

    private function reloadCurrentImages()
    {
        $this->current = [];

        foreach ($this->car->images as $image) {
            $this->current[] = [
                'file' => $image->file_name,
                'main' => $image->main,
            ];
        }
    }

    public function addImage()
    {
        $this->images[] = null;
    }

    public function saveImages()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'images.*'      => ['mimes:jpeg,jpg,png,gif', 'max:1024'],
        ],
        [
            'images.*.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif'
        ]);

        foreach ($this->images as $key => $image) {
            $extension = $image->getClientOriginalExtension();
            $filename = $key . now()->timestamp;
            $route = "car/" . $this->car->hashid;
            $image->storeAs("public/" . $route, $filename . "." . $extension);
            InterventionImage::make($image)->encode('webp', 80)->save(storage_path() . '/app/public/' . $route . '/' . $filename . '.webp');

            $this->car->images()->create([
                'file_name' => $filename . "." . $extension,
                'file_type' => $extension,
            ]);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'Images saved successfully');

        return redirect()->route('car.edit', ["car" => $this->car->hashid, "tab" => "images"]);
    }

    public function checkMain($checkKey)
    {
        $checkImage = $this->current[$checkKey];
        $this->car->images()->where('file_name', $checkImage['file'])->update([
            'main' => $this->current[$checkKey]['main']
        ]);

        // Uncheck other "Main image" checkboxes and update the image in the database
        foreach ($this->current as $key => $current) {
            if ($key != $checkKey && $current['main']) {
                $this->current[$key]['main'] = 0;
                $this->car->images()->where('file_name', $this->current[$key]['file'])->update([
                    'main' => 0
                ]);
            }
        }
    }

    public function deleteImage($key)
    {
        $filename = explode(".", $this->current[$key]['file'])[0];

        // Delete both the original image and the webp version
        Storage::disk('public')->delete("car/" . $this->car->hashid . '/' . $filename . ".webp");
        Storage::disk('public')->delete("car/" . $this->car->hashid . '/' . $this->current[$key]['file']);

        $this->car->images()->where('file_name', $this->current[$key]['file'])->delete();
        $this->car->refresh();
        $this->reloadCurrentImages();
    }

    public function render()
    {
        return view('livewire.admin.car.images');
    }
}
