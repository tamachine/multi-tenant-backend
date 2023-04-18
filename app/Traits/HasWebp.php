<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

/**
 * This trait uploads and deletes images in the storage public folder
 */
trait HasWebp
{        
    protected function createWebp($path) {
        $fullImagePath      = Storage::disk($this->disk)->path($path);    
        $webpFullImagePath  = $this->getWebpFullImagePath($fullImagePath);

        Image::load($fullImagePath)->format(Manipulations::FORMAT_WEBP)->save($webpFullImagePath);   
    }

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