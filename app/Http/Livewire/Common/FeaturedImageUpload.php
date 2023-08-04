<?php

namespace App\Http\Livewire\Common;

/**
 * This component uploads a featured image in a model. The model MUST use the HasFeaturedImage trait
 */
class FeaturedImageUpload extends ImageUpload
{       

     /** The text for the input
     * @var string
     */
    protected $text;

    protected $deleteImageListener = 'deleteFeaturedImage';

    /**
     * The modelImage of the image
     */
    public $modelImage;

    protected function getListeners()
    {
        return [$this->deleteImageListener => 'deleteImage'];  // this is used in the ImageCard component because the delete button is in there
    }

    public function mount($text)
    {
        $this->text = $text;        
        
        $this->setModelImage();
    }

    /**
     * Uploads the featured image
     */
    public function updatedImage()
    {                        
        $this->uploadImage();                      

        $this->setModelImage();          
        
        //we don't call any listener here (we do it only in the parent - ImageUpload) because there is no need to refresh the fallery because the gallery does not show featured images
    }  

    /**
    * Deletes the featured image
    */
    public function deleteImage()
    {               
        $this->deleteFeaturedImage();

        $this->resetAttributes();        

        //we don't call any listener here (we do it only in the parent - ImageUpload) because there is no need to refresh the fallery because the gallery does not show featured images
    }

    /**
     * PROTECTED METHODS
     */

     /**
      * Uploads the featured image
      */
    protected function uploadImage()
    {
        $this->model->uploadFeaturedImage($this->image, $this->imageName());   
    }    

    /**
     * Deletes the featured image
     */
    protected function deleteFeaturedImage()
    {
        $this->model->deleteFeaturedImage();
    }

    /**
     * Resets the atributes
     */
    protected function resetAttributes()
    {
        $this->image = null;
        $this->modelImage = null;
    }

    /**
     * Sets the ImageModel corresponding to the featured image
     */
    protected function setModelImage() {
        if($this->model->getFeaturedImageAttributeValue()) {
            $this->modelImage = $this->model->getFeaturedImageModelImageInstance();
        }        
    }

    public function render()
    {
        return view('livewire.common.featured-image-upload', ['text' => $this->text, 'deleteListener' =>  $this->deleteImageListener]);
    }
}
