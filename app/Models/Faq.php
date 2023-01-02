<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategory;
use Spatie\Translatable\HasTranslations;
use App\Traits\HashidTrait;

class Faq extends Model
{
    use HasFactory;  

    use HasTranslations;

    use HashidTrait;

    public $translatable = ['question', 'answer'];
    
    public function faqCategories()
    {
        return $this->belongsToMany(FaqCategory::class, 'faq_category_faq');
    }

    public static function boot()
    {
        parent::boot();
        
        // Attach event handler, on deleting of the Faq
        static::deleting(function($faq)
        {   
            // Delete all relations with faqCategories that belong to this faq          
            $faq->faqCategories()->detach();                   
        });
    }
}
