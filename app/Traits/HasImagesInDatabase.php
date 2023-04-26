<?php

namespace App\Traits;

use App\Models\ModelImage;
/**
 * This trait manage images in database
 */
trait HasImagesInDatabase
{       
    
    public function getImageModelInstance($path) {
        return ModelImage::findByPath($path);
    }
    
    protected function storeInDatabase($path, $alt) {
        ModelImage::updateOrCreate(
            [
                'image_url' => $path
            ],
            [                              
                'alt' => $alt, 
                'model' => $this->getModelName(), 
                'instance_hashid' => $this->hashid
            ]
        );
    }
    

    protected function deleteFromDatabase($path) {
        ModelImage::findByPath($path)?->delete();
    }

    protected function updateInDatabase($path, $name, $alt, $model) {
        $newPath = $name;

        ModelImage::findByPath($path)?->update(['image_url' => $newPath, 'alt' => $alt, 'model' => $model]);
    }

    protected function getModelName() {
        return get_class($this);
    }
}