<?php

namespace App\Traits;

use App\Models\ModelImage;

/**
 * This trait uploads the featured image hover and updates the corresponding column in the database
 * 
 * featured_image_hover column MUST exists in model's database table OR you can use an existing column defining $featured_image_hover_attribute attribute in your model:
 * 
 * protected $featured_image_hover_attribute ="the_column_in_database_used_for_the_featured_image_hover"
 * 
 * This trait uses HasUploadedImages in order to uploads the featured image hover. So if you want to upload/delete a featured image hover in the storage, don't use HasUploadImages trait, use this one.
 * 
 * There is another trait to mange featured_image -> HasFeaturedImage
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
        $this->uploadFeatured($input, $fileName, $this->getFeaturedImageHoverAttributeName());
    }   

    /**
     * Deletes a featured image hover and removes the image in the database
     */
    public function deleteFeaturedImageHover() {                           
        $this->deleteFeatured($this->getFeaturedImageHoverAttributeName());
    }

     /**
     * Returns the ModelImage that corresponds to the featured image hover
     * @return ModelImage
     */
    public function getFeaturedImagaHoverModelImageInstance() {
        $attribute = $this->getFeaturedImageHoverAttributeName();
        
        return ModelImage::find($this->$attribute);
    }

    /**
     * Returns the value of the columns used for the featured image 
     * @return int
     */
    public function getFeaturedImageHoverAttributeValue() {
        $attribute = $this->getFeaturedImageHoverAttributeName();

        return $this->$attribute;
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
        return $this->getFeaturedImagaHoverModelImageInstance()?->url;
    }

    /**
     * Get the featured image Hover PATH $this->featured_image_hover_path
     *
     * @return string
     */
    public function getFeaturedImageHoverPathAttribute() {
        return $this->getFeaturedImagaHoverModelImageInstance()?->image_path;
    }
    
    /**
     * PROTECTED METHODS
     */

    /**
      * column in database for the featured image hover. It can be overrided defining a featured_image_hover_attribute in the model
      * @return string The value of $featured_image_hover_attribute in the model or featured_image that is the default column for featured image
      */
    protected function getFeaturedImageHoverAttributeName() {
        return $this->featured_image_hover_attribute ?? $this->default_attribute_hover;
    }
}