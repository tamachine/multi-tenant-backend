<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use App\Traits\HasUploadImages;

class WebImage extends Model
{  
    use HashidTrait, HasUploadImages;

    protected $fillable = ['group', 'key'];

    protected $append = ['full_key'];

    public function getFullKeyAttribute(){
        return $this->group . "." . $this->key;
    }
   
    /*
     * Scope to find by the full key
     */
    public function scopeFindByFullKey($query, $fullKey) {        
        return $query->whereRaw("CONCAT(`group`, '.', `key`) = ?", ["{$fullKey}"])->first();
    }

    /**
     * Get the web image's image.
     */
    public function image()
    {
        return $this->morphOne(ModelImage::class, 'instance');
    }

}
