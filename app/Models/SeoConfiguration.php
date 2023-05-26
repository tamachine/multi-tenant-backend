<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SeoConfiguration extends Model
{  
    use HasTranslations;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['meta_title', 'meta_description', 'noindex', 'nofollow', 'lang', 'canonicals'];

    protected $fillable  = ['meta_title', 'meta_description', 'noindex', 'nofollow', 'lang', 'canonicals'];

     /**
     * Get the parent instance model
     */
    public function instance()
    {
        return $this->morphTo();
    }
}