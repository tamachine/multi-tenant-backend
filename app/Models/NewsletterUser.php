<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;

class NewsletterUser extends Model
{
    use HashidTrait, HasApiResponse;

    protected $fillable = ['email','active'];   
    
    protected $apiResponse = ['email','active'];

    public function bookings() {
        return $this->hasMany(Booking::class, 'email', 'email');
    }

    /**********************************
     * Scopes
     **********************************/

    public function scopeSubscribers($query) {
        return $query->where('active', 1);
    }

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
                $query->where('email', 'like', $term);
            });
        }

        return $query;
    }
}
