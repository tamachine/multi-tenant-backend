<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use App\Traits\HasSEOConfigurations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class BlogCategory extends Model implements LocalizedUrlRoutable
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations, HasSEOConfigurations, HasApiResponse;

    protected $table = 'blog_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'name', 'slug',
    ];

    protected $apiResponse = ['hashid', 'name', 'slug', 'translatedSlugs'];


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['name', 'slug'];

    protected $append = ['url'];

     /**
     * Returns for a given locale the translated slug
     * It is used for translatable routes in mcnamara localization package and in Services\SeoCOnfigurations class
     * This method has to be defined when implementing LocalizedUrlRoutable or using HasSEOConfigurations trait
     * @return string
     */
    public function getLocalizedRouteKey($locale)
    {
        return $this->getTranslation('slug', $locale);
    }

    /**********************************
     * Accessors & Mutators
     **********************************/

       /**
     * Get the category's edit URL
     *
     * @return     string
     */
    public function getUrlAttribute()
    {
        return route('blog.search.category', $this->slug);
    }

    /**
     * Get the category's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.blog.category.edit', $this->hashid);
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

    /**********************************
     * Relationships
     **********************************/

    /**
     * Related posts
     *
     * @return object
     */
    public function posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * Related published posts
     *
     * @return object
     */
    public function postsPublished()
    {
        return $this->hasMany(BlogPost::class)->published();
    }

    protected function translatedSlugs(): array
    {
        return $this->getTranslations("slug");
    }
}
