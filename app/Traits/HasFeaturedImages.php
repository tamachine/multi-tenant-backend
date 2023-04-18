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
 */
trait HasFeaturedImages
{        
    use HasImages;

    public function uploadFeaturedImageDefault($input, $fileName = null) {              
        $this->uploadFeaturedImage($input, $fileName);
    }

    public function uploadFeaturedImageHover($input, $fileName = null) {              
        $this->uploadFeaturedImage($input, $fileName, 'featured_image_hover');
    }

    /**
     * Get the featured image URL
     *
     * @return     string
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->getFeaturedImageUrl($this->featured_image);
    }

    /**
     * Get the featured image Hover URL
     *
     * @return string
     */
    public function getFeaturedImageHoverUrlAttribute()
    {
        return $this->getFeaturedImageUrl($this->featured_image_hover);
    }
    
    /**
     * uploads the image and save the path in the database
     */
    protected function uploadFeaturedImage($input, $fileName, $attribute = 'featured_image') {
        $path = $this->uploadImage($input, $fileName);
        
        $this->$attribute = $path;

        $this->save();
    }

    /**
     * returns the url of the image
     */
    protected function getFeaturedImageUrl($image) {
        if (filter_var($image, FILTER_VALIDATE_URL)) { //check if the path is already a url
            return $image;
        } else {
            return $image ? Storage::url($image) : '';
        }
    }
}