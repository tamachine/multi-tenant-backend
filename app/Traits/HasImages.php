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

    public function uploadImage($input, $fileName = null) {              
        $fileName = $fileName ?? now()->timestamp;
        $fileNameWithExtension = $fileName . '.' . $input->getClientOriginalExtension();
        
        $path = $input->storeAs($this->getFolderPath(), $fileNameWithExtension , $this->disk);       
        
        $this->createWebp($path);

        return $path;
    }

    public function getImages() {
        $allImages = Storage::disk($this->disk)->files($this->getFolderPath());

        return array_filter($allImages, function($image) {
            return (pathinfo($image, PATHINFO_EXTENSION) != Manipulations::FORMAT_WEBP);
        });
    }        

    public function deleteImage($fileName) {
        Storage::disk($this->disk)->delete($fileName);

        Storage::disk($this->disk)->delete($this->getWebpFullImagePath($fileName));
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
     * The name of the mode for the folder
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