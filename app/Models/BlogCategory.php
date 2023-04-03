<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BlogCategoryColor;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations;

    public static function boot() {
        parent::boot();

        static::creating(function (BlogCategory $item) {
            $color = new BlogCategoryColor();
            $item->color_id = $color->getColorId();
        });
    }

    public function getColorAttribute() {
        $color = new BlogCategoryColor();
        return $color->getBlogCategoryColor($this->color_id);
    }

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

    /**********************************
     * Accessors & Mutators
     **********************************/

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
