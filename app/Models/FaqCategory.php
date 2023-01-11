<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;
use Spatie\Translatable\HasTranslations;
use App\Traits\HashidTrait;
use App\Traits\HasApiResponse;

class FaqCategory extends Model
{
    use HasFactory;

    use HasTranslations;

    use HashidTrait;

    public $translatable = ['name'];

    protected $fillable = [
        'name', 
    ];
    
    use HasApiResponse;

    protected $apiResponse = ['hashid', 'name']; 

    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_category_faq');            
    }   

    public static function boot()
    {
        parent::boot();
        
        // Attach event handler, on deleting of the FaqCategory
        static::deleting(function($faqCategory)
        {   
            // Delete all relations with faqs that belong to this faqCategory           
            $faqCategory->faqs()->detach();                   
        });
    }

    /**********************************
    * Methods
    **********************************/

    /**
     * Checks if the category can be deleted
     */
    public function canBeDeleted() {
        return (self::without([$this->id])->count() > 1); //can be deleted only if there are more faq categories
    }

    /**********************************
    * Scopes
    **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $search)
    {
        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('name', 'like', $term);
            });
        }

        return $query;
    }
}
