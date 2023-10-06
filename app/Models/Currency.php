<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model{

    use HasApiResponse, HasFactory, HashidTrait;

    protected $fillable = ['hashid', 'name', 'code','symbol'];

    protected $apiResponse = ['hashid', 'name','code','symbol'];


    public function getTextTranslated() {
        return $this->text[App::getLocale()];
    }

    /**********************************
     * Relations
     **********************************/
    public function rate()
    {
        return $this->hasOne(CurrencyRate::class);
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
                    ->orWhere('code', 'like', $term);
            });
        }

        return $query;
    }
}
