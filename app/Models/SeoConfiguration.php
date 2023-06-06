<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Page;

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
}