<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;
use Spatie\Translatable\HasTranslations;

class FaqCategory extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];
    
    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_category_faq');            
    }   
}
