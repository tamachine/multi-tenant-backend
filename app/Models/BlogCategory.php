<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'name', 'slug',
    ];


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['name', 'slug'];

    protected $append = ['url'];


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
}
