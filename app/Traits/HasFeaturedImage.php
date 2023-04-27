<?php

namespace App\Traits;

use App\Traits\HasUploadImages;
use App\Models\ModelImage;

/**
 * This trait uploads the featured image and updates the corresponding column in the database
 * 
 * featured_image column MUST exists in model's database table OR you can use an existing column defining $featured_image_attribute attribute in your model:
 * 
 * protected $featured_image_attribute ="the_column_in_database_used_for_the_featured_image"
 * 
 * This trait uses HasUploadedImages in order to uploads the featured image. So if you want to upload/delete a featured image in the storage, don't use HasUploadImages trait, use this one.
 * 
 * There is another trait to mange featured_image_hover -> HasFeaturedImageHover
 */
trait HasFeaturedImage
{        
    use HasUploadImages;

    protected $default_attribute = 'featured_image'; //default column name in database otherwise it is overrided in the model by $featured_image_attribute

    /**
     * PUBLIC METHODS 
     */

    /**
     * Uploads a featured image and saves the image in the database
     */
    public function uploadFeaturedImage($input, $fileName = null) {            
        $this->uploadFeatured($input, $fileName, $this->getFeaturedImageAttributeName());
    }    

    /**
     * Deletes a featured image and removes the image in the database
     */
    public function deleteFeaturedImage() {            
        $this->deleteFeatured($this->getFeaturedImageAttributeName());
    }

    /**
     * Returns the ModelImage that corresponds to the featured image
     * @return ModelImage
     */
    public function getFeaturedImageModelImageInstance() {
        $attribute = $this->getFeaturedImageAttributeName();

        return ModelImage::find($this->$attribute);
    }

    /**
     * Returns the value of the columns used for the featured image 
     * @return int
     */
    public function getFeaturedImageAttributeValue() {
        $attribute = $this->getFeaturedImageAttributeName();

        return $this->$attribute;
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
        return $this->getFeaturedImageModelImageInstance()?->url;
    }  

    /**
     * Get the featured image PATH $this->featured_image_path
     *
     * @return string
     */
    public function getFeaturedImagePathAttribute() {
        return $this->getFeaturedImageModelImageInstance()?->image_path;
    }    

    /**
     * PROTECTED METHODS
     */

     /**
      * column in database for the featured image. It can be overrided defining a featured_image_attribute in the model
      * @return string The value of $featured_image_attribute in the model or featured_image that is the default column for featured image
      */
    protected function getFeaturedImageAttributeName() {
        return $this->featured_image_attribute ?? $this->default_attribute;
    }        

    /**
     * uploads the image and saves the path in the database
     */
    protected function uploadFeatured($input, $fileName, $attribute) {
        $this->deleteUploadedImage($this->$attribute);  

        $this->$attribute = $this->uploadImage($input, $fileName);         

        $this->save();
    } 

    /**
     * deletes the image and removes the path in the database
     */
    protected function deleteFeatured($attribute) {
        $this->deleteUploadedImage($this->$attribute);  

        $this->$attribute = null;         

        $this->save();
    } 
}