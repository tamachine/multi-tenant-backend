<?php

namespace App\Services\Image;

use App\Services\Image\ImageComponentInterface;
use App\Models\ModelImage;

/**
 * 
 * This class implements ImageComponentInterface in order to get the imageComponent attribute in the Image component when a ModelImage instance is passed to Image component
 */
class ModelImageComponent implements ImageComponentInterface
{    
    /**
     * The model image component instance
     */
    protected ModelImage $image;

    /** The alt to be returned on getAlt method
     * @return string
     */
    protected $altToReturn;

    /** The url to be returned on getImageUrl method
     * @return string
     */
    protected $imageUrlToReturn;

     /** The url to be returned on getWebpImageUrl method
     * @return string
     */
    protected $webpImageUrlToReturn;

     /** The value to be returned on hasWebp method
     * @return bool
     */
    protected $hasWebpToReturn = false;

    public function __construct(ModelImage $modelImage) {        
        $this->image = $modelImage;
               
        $this->setAlt();
        $this->setImageUrl();
        $this->setHasWebp();
        $this->setWebpImageUrl();
                       
    }

    /**
     * Methods for ImageComponentInterface interface 
     * */

    public function getImageUrl(): string {
        return $this->imageUrlToReturn;
    }  

    public function getWebpImageUrl(): string {
        return $this->webpImageUrlToReturn;
    }  

    public function getAlt(): string|null {
        return $this->altToReturn;
    }

    public function hasWebp(): bool {
        return $this->hasWebpToReturn;
    }

    /**
     * Protected methods
     */

    protected function setAlt(){
        $this->altToReturn = $this->image->alt;
    }

    protected function setImageUrl() {
        $this->imageUrlToReturn = $this->image->url;
    }

    protected function setHasWebp() {
        $this->hasWebpToReturn = $this->image->has_webp;
    }

    protected function setWebpImageUrl() {
        $this->webpImageUrlToReturn = $this->image->webp_url;
    }
}