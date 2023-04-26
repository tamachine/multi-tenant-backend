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
     * The modelImage of the image
     */
    public $modelImage;

    protected $listeners = [
        'deleteFeaturedImage' => 'deleteImage',        
    ];

    public function mount($text)
    {
        $this->text = $text;        
        
        $this->setFeaturedImagePath();
    }

    public function updatedImage()
    {                        
        $this->uploadImage();                      

        $this->setFeaturedImagePath();                    
    }  

    public function uploadImage()
    {
        $this->model->uploadFeaturedImageDefault($this->image);   
    }
    
    public function deleteImage()
    {               
        $this->deleteFeaturedImage();

        $this->resetAttributes();

        $this->emit('imageDeleted');
    }

    protected function getDeleteListener() {
        return 'deleteFeaturedImage';
    }

    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImageDefault();
    }

    protected function resetAttributes()
    {
        $this->image = null;
        $this->modelImage = null;
    }

    protected function setFeaturedImagePath() {
        if($this->model->featured_image_path) {
            $this->modelImage = $this->model->getFeaturedImageModelImageInstance();
        }        
    }

    public function render()
    {
        return view('livewire.common.featured-image-upload', ['text' => $this->text, 'deleteListener' =>  $this->getDeleteListener()]);
    }
}
