<?php

namespace App\Traits;

/**
 * This trait uploads the featured image hover and updates the column in the database
 * 
 * These columns MUST exists in model's database table:
 * featured_image_hover
 * OR you can define then in your model:
 * 
 * $featured_image_hover_attribute   -> featured_image_hover column
 */
trait HasFeaturedImageHover
{        
    use HasFeaturedImage;

    protected $default_attribute_hover = 'featured_image_hover'; //default column name in database otherwise it is overrided in the model with $featured_image_HOVER_attribute

    /**
     * PUBLIC METHODS 
     */   

    /**
     * Uploads a featured image hover and saves the image in the database
     */
    public function uploadFeaturedImageHover($input, $fileName = null) {                   
        $this->uploadFeaturedImage($input, $fileName, $this->featuredImageHoverAttribute());
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
     * Get the featured image Hover URL $this->featured_image_hover_url
     *
     * @return string
     */
    public function getFeaturedImageHoverUrlAttribute() {
        return $this->getFeaturedImageUrl($this->featuredImageHoverAttribute());
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
     * column in database for the featured image hover. It can be overrided defining a featured_image_default_attribute in the model
    */
    protected function featuredImageHoverAttribute() {
        return $this->featured_image_hover_attribute ?? $this->default_attribute_hover;
    }
}