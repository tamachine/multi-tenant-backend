<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;

class Page extends Model
{  

    use HashidTrait;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */

    protected $fillable  = ['route_name', 'uri', 'description', 'controller', 'method'];    

    
     /**
     * Scope to return the pages without its corresponding translations
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeByRouteName($query) {
        $query->groupBy('route_name')->selectRaw('route_name, ANY_VALUE(description) as description');
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
            
            $term = '%'.$search.'%';

            $query->where('route_name', 'like', $term)->orWhere('description', 'like', $term);                
        }      
        
        return $query;
    }
}