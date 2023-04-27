<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\ModelImage;

/**
 * This component shows an image card (image, delete button, copy button, etc..) for a ModelImage instance 
 */
class ImageCard extends Component
{       
    /** The image path
     * @var string
     */
    public $imagePath = '';

    /** The image url
     * @var string
     */
    public $imageUrl = '';

    /** The listener to call when deleting
     * @var string
     */
    public $deleteListener = null;

    /** The key to delete when we are in the image gallery component
     * @var string
     */
    public $deleteListenerParam = null;

     /** The name of the image
     * @var string
     */
    public $imageName = '';
        
    /**
     * The ModelImage instance
     */
    public ModelImage $modelImage;    

    public function mount() {                        
        $this->setAttributes();
    }

    /**
     * When deleting, we have to call the corresponding livewire component (featured image, featerd image hover or image gallery)
     */
    public function deleteImage() {        
        $this->emit($this->deleteListener, $this->deleteListenerParam);                
    }

    /**
     * Change the name of the image
     */
    public function changeName() {
        $this->validate(['imageName' => 'required|regex:/^[a-zA-Z0-9]+$/']);

        $this->modelImage->instance->changeUploadedFileName($this->modelImage->image_path, $this->imageName);

        $this->modelImage->refresh();

        $this->setAttributes();

        $this->dispatchBrowserEvent('open-success', ['message' => 'File name changed correctly']); 
    }

    public function render()
    {
        return view('livewire.common.image-card');
    }  
    
    protected function setAttributes() {
        $this->imageUrl  = $this->modelImage->url;        
        $this->imageName = $this->modelImage->image_name;
    }
}
