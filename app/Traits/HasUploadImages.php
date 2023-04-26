<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasWebp;
use App\Traits\HasModelImages;

/**
 * This trait uploads and deletes images in the storage public folder
 */
trait HasUploadImages
{        
    use HasWebp, HasModelImages;

    protected $disk = 'public';

     /**
     * When any model is deleted we need to delete all the images     
     *
     * @return void
     */
    public static function bootHasUploadImages()
    {
        static::deleting(
            function ($model) {
                $model->deleteImages();
            }
        );
    }

    /**
     * Uploads an image
     */
    public function uploadImage($input, $fileName = null, $alt = null) {              
        $fileName = $fileName ?? now()->timestamp;
        $fileNameWithExtension = $fileName . '.' . $input->getClientOriginalExtension();
        
        $path = $input->storeAs($this->getFolderPath(), $fileNameWithExtension , $this->disk);       
        
        $this->createWebp($path);

        $id = $this->storeImageInDatabase($path, $alt, $this->getModelFolder());

        return $id;
    }    
    
    /**
     * Deletes all the existing images of the model.
     */
    public function deleteImages() {
        Storage::disk($this->disk)->deleteDirectory($this->getFolderPath());
    }     

    /**
     * Deletes the image and its corresponding webp
     */
    public function deleteImage($id) {
        $path = $this->deleteFromDatabase($id);

        if ($path != null) {            
            $this->deleteIfExists($path); //the image
            $this->deleteIfExists($this->getWebpFullImagePath($path));  //its corresponding webp            
        }        
    }       
    
    protected function deleteIfExists($image) {
        if (Storage::disk($this->disk)->exists($image)) {
            Storage::disk($this->disk)->delete($image);
        }
    }    

    /**
     * The folder to store the image
     * 
     * @return string 'model/hashid'
     */
    protected function getFolderPath() {
        return $this->getModelFolder() . '/' . $this->getInstanceFolder();
    }

    /**
     * The name of the model for the folder
     * 
     * @return string 'blogpost, extra, car  ...'
     */
    protected function getModelFolder() {
        return strtolower(class_basename($this));
    }

    /**
     * The id for the instance folder
     * 
     * @return string 'usually hashid'
     */
    protected function getInstanceFolder() {
        return $this->hashid;
    }     
}