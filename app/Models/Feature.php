<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{

    use HasTranslations, HashidTrait, HasFactory;
    
    protected $fillable = [
        'name', 
    ];

    public $translatable = ['name'];

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

     /**
     * The users that belong to the role.
     */
    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }
}
