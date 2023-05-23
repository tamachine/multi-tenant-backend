<?php

namespace App\Services\Image;

use App\Services\Image\ImageComponentInterface;
use App\Helpers\Language;
use App;

/**
 * 
 * This class implements ImageComponentInterface in order to get the imageComponent attribute in the Image component when a path instance is passed to Image component
 */
class PathImageComponent implements ImageComponentInterface
{
    protected $path; //the passed path
    protected $alt; //tha passed alt
    protected $isExternalUrl; //if the path is an external url
    protected $webpPath; //the corresponding webp path

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

    public function __construct(string $path, array $alt) {
        $this->path = $path;
        $this->alt  = $alt;
        
        $this->setIsExternalUrl();
        $this->setWebpPath();

        $this->setAlt();
        $this->setImageUrl();
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
        if(!$this->isExternalUrl) {            
            return file_exists(public_path($this->webpPath));
        }

        return false;
    }


    /**
     * Sets the image url for the path
     */
    protected function setImageUrl() {
        $this->imageUrlToReturn = $this->isExternalUrl ? $this->path : asset($this->path);
    }

    /**
     * Sets the corresponding webp image if exists
     */
    protected function setWebpImageUrl() {
        $this->webpImageUrlToReturn = null;
        
        if(!$this->isExternalUrl) {
            if($this->hasWebp()) {
                $this->webpImageUrlToReturn = asset($this->webpPath);
            }
        }        
    }
    
    /**
     * Sets the alt for the image based on current locale or default
     */
    protected function setAlt() {
        $defaultCode = Language::defaultCode();
        $currentCode = App::getLocale();

        if (isset($this->alt[$currentCode])) {
            $this->altToReturn = $this->alt[$currentCode];
        } elseif(isset($this->alt[$defaultCode])) {
            $this->altToReturn = $this->alt[$defaultCode];
        } 
    }

    /**
     * Sets if the path is an external url
     */
    protected function setIsExternalUrl() {
        $this->isExternalUrl = filter_var($this->path, FILTER_VALIDATE_URL);   
    }

    /**
     * Sets the path for the corresponding webp image
     */
    protected function setWebpPath() {        
        $this->webpPath = pathinfo($this->path)['dirname'] . '/' . pathinfo($this->path)['filename'] . '.webp';
    }
}