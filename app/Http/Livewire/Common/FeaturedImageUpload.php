<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image or a featured image hover in a model. The model MUST use the HasFeaturedImages trait
 */
class FeaturedImageUpload extends ImageUpload
{       

     /** The text for the input
     * @var string
     */
    protected $text;

    /**
     * The url of the featured image
     */
    public $featured_image_url;

    public function mount($text)
    {
        $this->text = $text;        
        
        $this->setFeaturedImageUrl();
    }

    public function updatedImage()
    {                        
        $this->uploadImage();                      

        $this->setFeaturedImageUrl();    
        
        $this->emit('imageUploaded');
    }  

    public function uploadImage()
    {
        $this->model->uploadFeaturedImageDefault($this->image);   
    }
    
    public function deleteImage()
    {               
        $this->deleteFeaturedImage();

        $this->resetAttributes();

        $this->emit('imageUploaded');
    }

    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImageDefault();
    }

    protected function resetAttributes()
    {
        $this->image = null;
        $this->featured_image_url = null;
    }

    protected function setFeaturedImageUrl() {
        $this->featured_image_url = $this->model->featured_image_url;
    }

    public function render()
    {
        return view('livewire.common.featured-image-upload', ['text' => $this->text]);
    }
}
