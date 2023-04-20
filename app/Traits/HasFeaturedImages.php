<?php

namespace App\Traits;

use App\Traits\HasImages;
use Illuminate\Support\Facades\Storage;

/**
 * This trait uploads the featured image and the featured image hover and updates the column in the database
 * 
 * These columns MUST exists in model's database table:
 * featured_image
 * featured_image_hover
 * 
 * or you can define then in your model:
 * 
 * $featured_image_default_attribute -> featured_image column
 * $featured_image_hover_attribute   -> featured_image_hover column
 */
trait HasFeaturedImages
{        
    use HasImages;

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
     * Uploads a featured image hover and saves the image in the database
     */
    public function uploadFeaturedImageHover($input, $fileName = null) {                   
        $this->uploadFeaturedImage($input, $fileName, $this->featuredImageHoverAttribute());
    }

    /**
     * Deletes a featured image and removes the image in the database
     */
    public function deleteFeaturedImageDefault() {            
        $this->deleteFeaturedImage($this->featuredImageDefaultAttribute());
    }

    /**
     * Deletes a featured image hover and removes the image in the database
     */
    public function deleteFeaturedImageHover() {                           
        $this->deleteFeaturedImage($this->featuredImageHoverAttribute());
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
     * Get the featured image Hover URL $this->featured_image_hover_url
     *
     * @return string
     */
    public function getFeaturedImageHoverUrlAttribute() {
        return $this->getFeaturedImageUrl($this->featuredImageHoverAttribute());
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
     * Get the featured image Hover PATH $this->featured_image_hover_path
     *
     * @return string
     */
    public function getFeaturedImageHoverPathAttribute() {
        return $this->getFeaturedImagePath($this->featuredImageHoverAttribute());
    }

    /**
     * PROTECTED METHODS
     */

     /**
      * column in database for the featured image. It can be overrided defining a featured_image_default_attribute in the model
      */
    protected function featuredImageDefaultAttribute() {
        return $this->featured_image_default_attribute ?? 'featured_image';
    }
    
    
     /**
      * column in database for the featured image hover. It can be overrided defining a featured_image_default_attribute in the model
      */
    protected function featuredImageHoverAttribute() {
        return $this->featured_image_hover_attribute ?? 'featured_image_hover';
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
        if (filter_var($this->$attribute, FILTER_VALIDATE_URL)) { //check if the path is already a url
            return $this->$attribute;
        } else {
            return $this->$attribute ? Storage::url($this->$attribute) : '';
        }
    }

    /**
     * returns the url of the image
     */
    protected function getFeaturedImagePath($attribute) {        
        return $this->$attribute;
    }
}