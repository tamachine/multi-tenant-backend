<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogAuthor extends Model
{
    use HasFactory, HashidTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hashid', 'name', 'slug', 'bio', 'meta_title', 'meta_description', 'photo'
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the affiliate's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('blog.author.edit', $this->hashid);
    }

    /**
     * Get the author's photo URL
     *
     * @return     string
     */
    public function getPhotoUrlAttribute()
    {
        return $this->photo
            ? asset('storage/authors/' . $this->photo)
            : '';
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
