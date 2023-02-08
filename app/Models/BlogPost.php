<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'title', 'slug', 'published', 'published_at', 'summary', 'content', 'featured_image',
        'blog_author_id', 'blog_category_id'
    ];

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
        return route('blog.post.edit', $this->hashid);
    }

    /**
     * Get the post's featured image URL
     *
     * @return     string
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image
            ? asset('storage/posts/' . $this->featured_image)
            : '';
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
                $query->where('name', 'like', $term)
                    ->orWhere('summary', 'like', $term);
            });
        }

        return $query;
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
