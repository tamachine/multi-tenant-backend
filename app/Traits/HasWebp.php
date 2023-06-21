<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * This trait manages webp images
 */
trait HasWebp
{        
    protected $disk = 'images';
    
    /**
     * Creates a webp image
     * @var $path string Path of the image inside the 'public' disk.
     */     
    protected function createWebp($path) {
        $fullImagePath      = Storage::disk($this->disk)->path($path);    
        $webpFullImagePath  = $this->getWebpFullImagePath($fullImagePath);

        Image::load($fullImagePath)->format(Manipulations::FORMAT_WEBP)->save($webpFullImagePath);   
    }

    /**
     * Returns the full path of the corresponding webp image
     */
    protected function getWebpFullImagePath($fullImagePath) {
        $fileName     = pathinfo($fullImagePath, PATHINFO_FILENAME);        
        $fileFullName = pathinfo($fullImagePath, PATHINFO_BASENAME);

        return str_replace(
            $fileFullName, 
            $fileName.'.'.Manipulations::FORMAT_WEBP,
            $fullImagePath
        );
    }            
}