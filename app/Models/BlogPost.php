<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasUploadImages;
use App\Traits\HasFeaturedImage;
use App\Traits\HasFeaturedImageHover;
use App\Traits\HasSEOConfigurations;
use \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class BlogPost extends Model implements LocalizedUrlRoutable
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations, HasUploadImages, HasFeaturedImage, HasFeaturedImageHover, HasSEOConfigurations;    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'title', 'slug', 'published_at', 'summary', 'content', 'featured_image', 'featured_image_hover',
        'blog_author_id', 'blog_category_id', 'hero', 'top'
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['title', 'slug', 'summary', 'content'];

    protected $append = ['url','preview_url', 'next_post', 'prev_post', 'related_posts', 'published'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at'    => 'datetime',
    ];

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

     public function getPublishedAttribute() {
        if ($this->published_at != null) {
            return $this->published_at <= now();
        } else {
            return false;
        }
     }

    /**
     * Get the post's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.blog.post.edit', $this->hashid);
    }   

    /**
     * Get the post's tags in a single string
     *
     * @return     string
     */
    public function getTagsStringAttribute()
    {
        $tags = [];

        foreach($this->tags as $tag) {
            $tags[] = $tag->name;
        }

        return implode(", ", $tags);
    }

    public function getUrlAttribute()
    {
        return route('blog.show', $this->slug);
    }

    public function getPreviewUrlAttribute()
    {
        return route('blog.preview', $this->slug);
    }

    public function getNextPostAttribute()
    {
        return BlogPost::published()->where('published_at','<', $this->published_at)->whereNotIn('id', [$this->id])->orderBy('published_at', 'desc')->first();
    }

    public function getPrevPostAttribute()
    {
        return BlogPost::published()->where('published_at','>', $this->published_at)->whereNotIn('id', [$this->id])->orderBy('published_at', 'asc')->first();
    }

    public function getRelatedPostsAttribute()
    {
        $numOfPosts = 3;

        $byCategories = BlogPost::published()->whereHas('category', function(Builder $query) {

            $query->where('id', $this->blog_category_id);

        } )->where('blog_posts.id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts)->get();

        if($byCategories->count() < $numOfPosts) {

            $byTags = BlogPost::published()->whereHas('tags', function(Builder $query) {

                $query->whereIn('blog_tags.id', $this->tags->pluck('id'));

            } )->where('blog_posts.id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts - $byCategories->count())->get();

            $categoriesAndTags = $byCategories->merge($byTags);

            if($categoriesAndTags->count() < $numOfPosts) {

                $notRelated = BlogPost::published()->where('blog_posts.id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts - $categoriesAndTags->count())->get();

                return $categoriesAndTags->merge($notRelated);

            } else {

                return $categoriesAndTags;
            }

        } else {

            return $byCategories;

        }

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
                $query->where('title', 'like', $term)
                    ->orWhere('summary', 'like', $term);
            });
        }

        return $query;
    }

    public function scopePublished($query)
    {
        return $query->where('published_at','<=', now());
    }

    public function scopeHero($query)
    {
        return $query->where('hero', 1);
    }

    public function scopeTop($query)
    {
        return $query->where('top', 1);
    }

    /**********************************
     * Relationships
     **********************************/

    /**
     * Related category
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id')->withTrashed();
    }

    /**
     * Related author
     *
     * @return object
     */
    public function author()
    {
        return $this->belongsTo(BlogAuthor::class, 'blog_author_id')->withTrashed();
    }

    /**
     * Related tags
     *
     * @return object
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\BlogTag')->withTimestamps();
    }
}
