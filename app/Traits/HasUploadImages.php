<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasWebp;
use App\Traits\HasImages;
use App\Traits\HasFiles;

/**
 * This trait uploads and deletes images in the storage public folder
 * Uses the HasImages trait in order to store them in database and the HasWebp in order to manage the corresponding webp images
 */
trait HasUploadImages
{        
    use HasWebp, HasImages, HasFiles;

    protected $disk = 'images';

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
     * @var string $fileName The file name of the image without extension
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
     * renames the file, its corresponding webp file and the record in the database
     * @var string $currentPath The current image path
     * @var string $newName The new name
     * @return string the newPath
     */
    public function changeUploadedFileName($currentPath, $newName) {
        
        $newPath = $this->changeModelImageFileName($currentPath, $newName); //change the name in the database

        if (Storage::disk($this->disk)->exists($currentPath)) {
            
            if($this->hasWebp($currentPath)) {
                 
                $webpFullImagePath = $this->getWebpFullImagePath($currentPath);

                $this->changeFileName($webpFullImagePath, $newName); //change the corresponding webp image name
            }

            $this->changeFileName($currentPath, $newName); //change the image name           
        }

        return $newPath;
    }
    
    /**
     * Returns the base name of the image
     * @var file $input The image input to be stored
     * @var string $fileName The file name of the image (only file name)
     * @return string the base name of the image (file name + extension)
     */
    protected function getBaseName($input, $fileName = null) {
        $fileName = $fileName ?? now()->timestamp;       

        return $this->getFileName($fileName, $input->getClientOriginalExtension());
    }

    /**
     * Returns the file name to be uploaded. It is a recursive method that returns the fileName with a (1) at the end if the image already exists
     * @var string $fileName The file name of the image (only file name)
     * @var string $extension The extension
     */
    protected function getFileName($fileName, $extension) {

        $fullPath = $this->getFolderPath() . '/' . $fileName . '.' . $extension;

        if (Storage::disk($this->disk)->exists($fullPath)) {            
            
            return $this->getFileName($fileName. ' (1)', $extension);

        } else {
            
            return pathinfo($fullPath, PATHINFO_BASENAME);
            
        }        
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
     * Checks if the corresopnding webp image for the path exists in the storage
     */
    protected function hasWebp($path) {         
        $webpFullImagePath  = $this->getWebpFullImagePath($path);

        return Storage::disk($this->disk)->exists($webpFullImagePath);
    }    

    /**
     * Changes the name of an image
     * @var string $currentPath The current image path
     * @var string $newName The new name
     */
    protected function changeFileName($currentPath, $newName) {
        $newPath = str_replace_last(
            pathinfo($currentPath, PATHINFO_FILENAME), //the current image name  
            $newName, 
            $currentPath
        );

        Storage::disk($this->disk)->move($currentPath, $newPath);
    }
}