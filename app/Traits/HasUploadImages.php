<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasWebp;
use App\Traits\HasImages;

/**
 * This trait uploads and deletes images in the storage public folder
 * Uses the HasImages trait in order to store them in database and the HasWebp in order to manage the corresponding webp images
 */
trait HasUploadImages
{        
    use HasWebp, HasImages;

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
     * Uploads an image, creates its corresponding webp and stores it in database
     * @var file $input The image input to be stored
     * @var string $fileName The file name of the image
     * @var string $alt The alt of the image
     * @return int id of the image in the database
     */
    public function uploadImage($input, $fileName = null, $alt = null) {     

        $path = $input->storeAs(
                    $this->getFolderPath(), 
                    $this->getBaseName($input, $fileName) , 
                    $this->disk
                );       
        
        $this->createWebp($path);

        return $this->addImage($path, $alt, $this->getModelFolder());
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
    public function deleteUploadedImage($id) {
        $path = $this->deleteImage($id);

        if ($path != null) {            
            $this->deleteIfExists($path); //the image
            $this->deleteIfExists($this->getWebpFullImagePath($path));  //its corresponding webp            
        }        
    }       
    
    /**
     * Returns the base name of the image
     * @var file $input The image input to be stored
     * @var string $fileName The file name of the image (only file name)
     * @return string the base name of the image (file name + extension)
     */
    protected function getBaseName($input, $fileName = null) {
        $fileName = $fileName ?? now()->timestamp;

        return $fileName . '.' . $input->getClientOriginalExtension();
    }

    /**
     * Deletes an image in the storage if exists
     * @var string $path Path of the image to be deleted
     */
    protected function deleteIfExists($path) {
        if (Storage::disk($this->disk)->exists($path)) {
            Storage::disk($this->disk)->delete($path);
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