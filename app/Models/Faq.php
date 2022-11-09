<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategory;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory;  

    use HasTranslations;

    public $translatable = ['question', 'answer'];
    
    public function faqCategories()
    {
        return $this->belongsToMany(FaqCategory::class, 'faq_faq_category',
        'faq_category_id', 'faq_id');
    }
}
