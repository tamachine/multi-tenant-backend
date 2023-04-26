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

    public function scopeFindByPath($query, $path) {
        return $query->where('image_path', $path)->first();
    }

    public function getInstanceAttribute() {
        return $this->model::findByHashid($this->instance_hashid);
    }

    public function getUrlAttribute() {
        if ($this->is_external_url) { //check if the path is already a url
            return $this->image_path;
        } else {
            return $this->image_path ? Storage::url($this->image_path) : '';
        } 
    }   

    public function getIsExternalUrlAttribute() {
        return filter_var($this->image_path, FILTER_VALIDATE_URL);   
    }

    public function getImageNameAttribute() {
        return pathinfo($this->image_path, PATHINFO_FILENAME);
    }
}
