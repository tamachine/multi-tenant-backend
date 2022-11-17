<?php

namespace App\Http\Livewire\Admin\Car;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

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
            'images.*'      => ['mimes:jpeg,jpg,png,gif,webp'],
        ]);

        foreach ($this->images as $key => $image) {
            $extension = $image->getClientOriginalExtension();
            $filename = $key . now()->timestamp . "." . $extension;
            $image->storeAs("public/car/" . $this->car->hashid, $filename);

            $this->car->images()->create([
                'file_name' => $filename,
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
