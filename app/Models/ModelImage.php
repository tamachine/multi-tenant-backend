<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ModelImage extends Model
{
  //  use HasTranslations;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    //public $translatable = ['alt'];

    protected $fillable = ['image_path', 'model', 'alt', 'instance_hashid'];

    protected $append = ['instance', 'url', 'image_name', 'is_external_url'];

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
    
     /*
     * @return Model returns the model instance to which the image corresponds
     */
    public function getInstanceAttribute() {
        return $this->model::findByHashid($this->instance_hashid);
    }

    /**
     * @return string Returns the url of the image
     */
    public function getUrlAttribute() {
        if ($this->is_external_url) { 
            return $this->image_path;
        } else {
            return $this->image_path ? Storage::url($this->image_path) : '';
        } 
    }   

    /** Returns true if the image_path is already an external url and not a path
     * @return boolean
     */
    public function getIsExternalUrlAttribute() {
        return filter_var($this->image_path, FILTER_VALIDATE_URL);   
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
}
