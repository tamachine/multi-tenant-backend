<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Page;
use App\Models\SeoSchema;

class SeoConfiguration extends Model
{  
    use HasTranslations;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['meta_title', 'meta_description', 'lang', 'canonical'];

    protected $fillable  = ['meta_title', 'meta_description', 'noindex', 'nofollow', 'lang', 'canonical', 'instance_type', 'instance_id', 'page_id'];

     /**
     * Get the parent instance model
     */
    public function instance()
    {
        return $this->morphTo();
    } 
    
    public function page() {        
        return $this->belongsTo(Page::class);
    }

    public function seoSchemas() {
        return $this->hasMany(SeoSchema::class, 'seo_configuration_id', 'id');
    }
}