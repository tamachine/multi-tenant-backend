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

    public function uploadFeaturedImageDefault($input, $fileName = null) {            
        $this->uploadFeaturedImage($input, $fileName, $this->featuredImageDefaultAttribute());
    }

    public function uploadFeaturedImageHover($input, $fileName = null) {                   
        $this->uploadFeaturedImage($input, $fileName, $this->featuredImageHoverAttribute());
    }

    /**
     * Get the featured image URL
     *
     * @return     string
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->getFeaturedImageUrl($this->featuredImageDefaultAttribute());
    }

    /**
     * Get the featured image Hover URL
     *
     * @return string
     */
    public function getFeaturedImageHoverUrlAttribute()
    {
        return $this->getFeaturedImageUrl($this->featuredImageHoverAttribute());
    }

    protected function featuredImageDefaultAttribute() {
        return $this->featured_image_default_attribute ?? 'featured_image';
    }
    
    protected function featuredImageHoverAttribute() {
        return $this->featured_image_hover_attribute ?? 'featured_image_hover';
    }

    /**
     * uploads the image and save the path in the database
     */
    protected function uploadFeaturedImage($input, $fileName, $attribute) {
        $this->deleteImage($this->$attribute);  

        $path = $this->uploadImage($input, $fileName);
        
        $this->$attribute = $path;

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
}