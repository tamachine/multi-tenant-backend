<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategory;
use App\Models\FaqFaqCategory;
use Spatie\Translatable\HasTranslations;
use App\Traits\HashidTrait;
use App\Traits\HasApiResponse;

class Faq extends Model
{
    use HasFactory;  

    use HasTranslations;

    use HashidTrait;

    public $translatable = ['question', 'answer'];

    protected $fillable = ['question', 'answer'];

    use HasApiResponse;
    
    protected $apiResponse = ['hashid', 'question', 'answer'];
    
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

    /**
     * Scope to search the model
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $faq_category_id, $search)
    {
        if(FaqCategory::find($faq_category_id)) {
            $faqIds = FaqFaqCategory::where('faq_category_id', $faq_category_id)->pluck('faq_id')->toArray();
            $query->whereIn('id', $faqIds);
        }

        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('question', 'like', $term)
                ->orWhere('answer', 'like', $term);
            });
        }       

        return $query;
    }    
}
