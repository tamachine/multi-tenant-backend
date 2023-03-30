<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Translatable\HasTranslations;

class BlogPost extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'title', 'slug', 'published', 'published_at', 'summary', 'content', 'featured_image',
        'blog_author_id', 'blog_category_id', 'hero', 'top'
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['title', 'slug', 'summary', 'content'];

    protected $append = ['url','preview_url', 'next_post', 'prev_post', 'related_posts'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at'    => 'datetime',
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

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
     * Get the post's featured image URL
     *
     * @return     string
     */
    public function getFeaturedImageUrlAttribute()
    {
        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            return $this->featured_image;
        } else {
            return
                $this->featured_image
                ? asset('storage/posts/' . $this->featured_image)
                : '';
        }

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
        return BlogPost::published()->where('published_at','<', $this->published_at)->orderBy('published_at', 'desc')->first();
    }

    public function getPrevPostAttribute()
    {
        return BlogPost::published()->where('published_at','>', $this->published_at)->orderBy('published_at', 'asc')->first();
    }

    public function getRelatedPostsAttribute()
    {
        $numOfPosts = 3;

        $byCategories = BlogPost::published()->whereHas('category', function(Builder $query) {

            $query->where('id', $this->blog_category_id);

        } )->where('id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts)->get();

        if($byCategories->count() < $numOfPosts) {

            $byTags = BlogPost::published()->whereHas('tags', function(Builder $query) {

                $query->whereIn('id', $this->tags->pluck('id'));

            } )->where('id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts - $byCategories->count())->get();

            $categoriesAndTags = $byCategories->merge($byTags);

            if($categoriesAndTags->count() < $numOfPosts) {

                $notRelated = BlogPost::published()->where('id', '!=', $this->id)->orderBy('published_at', 'desc')->take($numOfPosts - $categoriesAndTags->count())->get();

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
        return $query->where('published', 1);
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
