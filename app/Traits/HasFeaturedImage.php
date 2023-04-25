<?php

namespace App\Traits;

use App\Traits\HasImages;

/**
 * This trait uploads the featured image and updates the column in the database
 * 
 * These columns MUST exists in model's database table:
 * featured_image
 * OR you can define it in your model:
 * 
 * $featured_image_default_attribute -> featured_image column
 */
trait HasFeaturedImage
{        
    use HasImages;

    protected $default_attribute = 'featured_image'; //default column name in database otherwise it is overrided in the model with $featured_image_default_attribute

    /**
     * PUBLIC METHODS 
     */

    /**
     * Uploads a featured image and saves the image in the database
     */
    public function uploadFeaturedImageDefault($input, $fileName = null) {            
        $this->uploadFeaturedImage($input, $fileName, $this->featuredImageDefaultAttribute());
    }    

    /**
     * Deletes a featured image and removes the image in the database
     */
    public function deleteFeaturedImageDefault() {            
        $this->deleteFeaturedImage($this->featuredImageDefaultAttribute());
    }

    /**
     * PUBLIC ATTRIBUTES
     */

    /**
     * Get the featured image URL $this->featured_image_url
     *
     * @return string
     */
    public function getFeaturedImageUrlAttribute() {
        return $this->getFeaturedImageUrl($this->featuredImageDefaultAttribute());
    }  

    /**
     * Get the featured image PATH $this->featured_image_path
     *
     * @return string
     */
    public function getFeaturedImagePathAttribute() {
        return $this->getFeaturedImagePath($this->featuredImageDefaultAttribute());
    }    

    /**
     * PROTECTED METHODS
     */

     /**
      * column in database for the featured image. It can be overrided defining a featured_image_default_attribute in the model
      */
    protected function featuredImageDefaultAttribute() {
        return $this->featured_image_default_attribute ?? $this->default_attribute;
    }        

    /**
     * uploads the image and saves the path in the database
     */
    protected function uploadFeaturedImage($input, $fileName, $attribute) {
        $this->deleteImage($this->$attribute);  

        $this->$attribute = $this->uploadImage($input, $fileName);         

        $this->save();
    } 

    /**
     * deletes the image and removes the path in the database
     */
    protected function deleteFeaturedImage($attribute) {
        $this->deleteImage($this->$attribute);  

        $this->$attribute = null;         

        $this->save();
    } 

    /**
     * returns the url of the image
     */
    protected function getFeaturedImageUrl($attribute) {
       return $this->getImageUrl($this->$attribute);
    }

    /**
     * returns the url of the image
     */
    protected function getFeaturedImagePath($attribute) {        
        return $this->$attribute;
    }
}