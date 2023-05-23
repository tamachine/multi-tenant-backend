<?php

namespace App\Services\Image;

/**
 * The Image component must implement this interface for its imageComponent attribute
 */
interface ImageComponentInterface {
    public function hasWebp(): bool; //checks if a webp image exists for the image    
    public function getAlt(): string|null; //gets the alt for the image      
    public function getImageUrl(): string;  //returns the image url    
    public function getWebpImageUrl(): string;  //returns the webp image url in case it exists    
}

?>