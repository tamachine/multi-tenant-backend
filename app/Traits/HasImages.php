<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasWebp;
use Spatie\Image\Manipulations;

/**
 * This trait uploads and deletes images in the storage public folder
 */
trait HasImages
{        
    use HasWebp;

    protected $disk = 'public';

     /**
     * When any model is deleted we need to delete all the images     
     *
     * @return void
     */
    public static function bootHasImages()
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
    public function uploadImage($input, $fileName = null) {              
        $fileName = $fileName ?? now()->timestamp;
        $fileNameWithExtension = $fileName . '.' . $input->getClientOriginalExtension();
        
        $path = $input->storeAs($this->getFolderPath(), $fileNameWithExtension , $this->disk);       
        
        $this->createWebp($path);

        return $path;
    }

    /**
     * Gets all the images of the instance except the ones with webp extension
     */
    public function getImages() {
        $allImages = $this->getAllImages();
        
        return array_filter($allImages, function($image) { //except webp
            return (pathinfo($image, PATHINFO_EXTENSION) != Manipulations::FORMAT_WEBP);
        });        
    }       

    /**
     * Gets all the images of the instance included the ones with webp extension
     */
    public function getAllImages() {
        return Storage::disk($this->disk)->files($this->getFolderPath()); //all images             
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
    public function deleteImage($fileName) {
       if ($fileName != null) {            
            $this->deleteIfExists($fileName);
            $this->deleteIfExists($this->getWebpFullImagePath($fileName));    
        }        
    }   

    /**
     * Returns the url of the image
     */
    public function getImageUrl($image) {
        if (filter_var($image, FILTER_VALIDATE_URL)) { //check if the path is already a url
            return $image;
        } else {
            return $image ? Storage::url($image) : '';
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