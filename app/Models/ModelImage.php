<?php

namespace App\Models;

use App\Traits\HasUploadImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\HasWebp;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\URL;

class ModelImage extends Model
{  
    use HasWebp, HasTranslations, HasUploadImages;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['alt'];

    protected $fillable = ['image_path', 'instance_type', 'instance_id', 'alt'];

    protected $append = ['url', 'image_name', 'is_external_url', 'has_webp', 'webp_url', 'relative_path', 'image_extension'];

    /**
     * SCOPES ------------
     * 
     */

     /*
     * Scope to find by the image_path column
     */
    public function scopeFindByPath($query, $path) {
        return $query->where('image_path', $path)->first();
    }
    
    /**
     * ATTRIBUTES ------------
     * 
     */    

     /**
     * Get the parent instance model
     */
    public function instance()
    {
        return $this->morphTo();
    }

    /**
     * @return string Returns the url of the image
     */
    public function getUrlAttribute() {
        if ($this->is_external_url) { 
            return $this->image_path;
        } else {
            return $this->image_path ? Storage::disk($this->disk)->url($this->image_path) : '';
        } 
    }   
    
     /**
     * @return string Returns the relative url of the image
     */
    public function getRelativePathAttribute() {
        $absoluteUrl = $this->url;
        $baseUrl = URL::to('/');
        return str_replace($baseUrl, '', $absoluteUrl); 
    } 

    /** Returns true if the image_path is already an external url and not a path
     * @return boolean
     */
    public function getIsExternalUrlAttribute() {
        return filter_var($this->image_path, FILTER_VALIDATE_URL);   
    }

     /** Returns true if the image has its corresponding webp
     * @return boolean
     */
    public function getHasWebpAttribute() {
        if(!$this->is_external_url) {
            return $this->hasWebp($this->image_path);
        }
        
        return false;
    }

     /** Returns the url for the webpImage
     * @return string
     */
    public function getWebpUrlAttribute() {
        if($this->has_webp) {
            return $this->getWebpFullImagePath($this->url);
        }
        
        return null;
    }

    /**
     * METHODS ------------
     */     

    /** Returns the name of the image without extension
     * @return string 
     */
    public function getImageNameAttribute() {
        return pathinfo($this->image_path, PATHINFO_FILENAME);
    }

     /** Returns the name of the image without extension
     * @return string 
     */
    public function getImageExtensionAttribute() {
        return pathinfo($this->image_path, PATHINFO_EXTENSION );
    }

    /**
     * Changes the file name
     * @return string the new image path
     */
    public function changeFileName($newFileName) {
        $newImagePath = str_replace_last(
                            $this->getImageNameAttribute(), 
                            $newFileName, 
                            $this->image_path
                        );

        $this->image_path = $newImagePath;

        $this->save();

        return $newImagePath;
    }
}
