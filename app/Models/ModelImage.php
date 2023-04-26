<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

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

    protected $append = ['instance', 'url', 'image_name'];

    public function scopeFindByPath($query, $path) {
        return $query->where('image_path', $path)->first();
    }

    public function getInstanceAttribute() {
        return $this->model::findByHashid($this->instance_hashid);
    }

    public function getUrlAttribute() {
        return $this->instance->getImageUrl($this->image_path);  
    }

    public function getImageNameAttribute() {
        return pathinfo($this->image_path, PATHINFO_FILENAME);
    }
}
