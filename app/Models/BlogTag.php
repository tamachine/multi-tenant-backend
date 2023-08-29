<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BlogTagColor;
use App\Traits\HasApiResponse;

class BlogTag extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasApiResponse;

    protected $apiResponse = ['hashid', 'name', 'slug'];

    public static function boot() {
        parent::boot();
    
        static::creating(function (BlogTag $item) { 
            $color = new BlogTagColor(); 
            $item->color_id = $color->getColorId();
        });
    }

    public function getColorAttribute() {
        $color = new BlogTagColor();
        return $color->getBlogTagColor($this->color_id);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'name', 'slug',
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/
    /**
     * Get the tag's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.blog.tag.edit', $this->hashid);
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
        return $this->belongsToMany('App\Models\BlogPost')->withTimestamps();
    }

    /**
     * Related published posts
     *
     * @return object
     */
    public function postsPublished()
    {
        return $this->belongsToMany(BlogPost::class)->published();
    }
}
