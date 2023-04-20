<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * This component uploads an image in a model. The model MUST use the HasImages trait
 */
class ImageUpload extends Component
{
    use WithFileUploads;

    /** The image
     * @var object
     */
    public $image;

    /** Model where the image have to be uploaded. 
     *  The model MUST use the HasImages trait
     * @var object
     */
    public $model;    
    
    public function save()
    {       
        $this->model->uploadImage($this->image);         
    }

    public function render()
    {
        return view('livewire.common.image-upload');
    }
}
