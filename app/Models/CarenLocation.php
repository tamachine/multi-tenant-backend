<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarenLocation extends Model
{
    use HasFactory, SoftDeletes, HasApiResponse;

    protected $apiResponse = ['name', 'caren_pickup_location_id', 'caren_dropoff_location_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'caren_pickup_location_id', 'caren_dropoff_location_id',
        'location_id'
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

    //

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
     * Related location
     *
     * @return object
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
