<?php

namespace App\Models;

use App\Traits\HashidTrait;
use App\Traits\HasApiResponse;
use App\Traits\HasFeaturedImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory, HashidTrait, SoftDeletes, HasTranslations, HasApiResponse, HasFeaturedImage;

    protected $apiResponse = ['hashid', 'name', 'pickup_show_input', 'dropoff_show_input', 'pickup_input_require', 'dropoff_input_require', 'pickup_input_info', 'dropoff_input_info', 'getFeaturedImageModelImageInstance'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'pickup_show_input', 'dropoff_show_input', 'pickup_input_require', 'dropoff_input_require',
        'pickup_input_info', 'dropoff_input_info', 'order_appearance',
        'caren_settings'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'caren_settings' => 'array'
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['name', 'pickup_input_info', 'dropoff_input_info'];

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the location's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.location.edit', $this->hashid);
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
