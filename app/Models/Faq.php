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
        return $this->belongsToMany(FaqCategory::class, 'faq_category_faq');
    }
}
