<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFeaturedImage;
use App\Traits\HasSEOConfigurations;
use \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class BlogAuthor extends Model implements LocalizedUrlRoutable
{
    use HasFactory, HashidTrait, SoftDeletes, HasFeaturedImage, HasSEOConfigurations, HasApiResponse;

    //for HasFeaturedImage
    protected $featured_image_attribute = 'photo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'name', 'slug', 'bio', 'short_bio', 'meta_title', 'meta_description', 'photo'
    ];

    protected $append = [
        'url'
    ];

    protected $apiResponse = ['hashid', 'name', 'bio', 'short_bio', 'photo', 'slug'];

     /**
     * Returns for a given locale the translated slug
     * It is used for translatable routes in mcnamara localization package and in Services\SeoCOnfigurations class
     * This method has to be defined when implementing LocalizedUrlRoutable or using HasSEOConfigurations trait
     * @return string
     */
    public function getLocalizedRouteKey($locale)
    {
        return $this->slug;
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
        return route('blog.search.author', $this->slug);
    }

    /**
     * Get the author's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.blog.author.edit', $this->hashid);
    }

    /**
     * Get the author's photo URL
     *
     * @return     string
     */
    public function getPhotoUrlAttribute()
    {
        return $this->getFeaturedImageUrlAttribute();
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
}
