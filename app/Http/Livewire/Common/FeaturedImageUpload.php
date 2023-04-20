<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image or a featured image hover in a model. The model MUST use the HasFeaturedImages trait
 */
class FeaturedImageUpload extends ImageUpload
{    

    /** if the featured image is the default or the hover one
     * @var bool
     */
    public $isHover;

     /** The text for the input
     * @var string
     */
    protected $text;

    /**
     * The url of the featured image
     */
    public $featured_image_url;

    public function mount($text, $isHover = false)
    {
        $this->text     = $text;
        $this->isHover  = $isHover;      
        
        $this->setFeaturedImageUrl();
    }

    public function updatedImage()
    {      
        if($this->isHover) {
            $this->model->uploadFeaturedImageHover($this->image);  
        } else {
            $this->model->uploadFeaturedImageDefault($this->image);  
        }                  

        $this->setFeaturedImageUrl();
    }  
    
    public function deleteImage()
    {        
        if($this->isHover) {
            $this->model->deleteFeaturedImageHover();
        } else {
            $this->model->deleteFeaturedImageDefault();
        }        

        $this->image = null;
        $this->featured_image_url = null;
    }

    protected function setFeaturedImageUrl() {
        $this->featured_image_url = $this->isHover ? $this->model->featured_image_hover_url : $this->model->featured_image_url;
    }

    public function render()
    {
        return view('livewire.common.featured-image-upload', ['text' => $this->text]);
    }
}
