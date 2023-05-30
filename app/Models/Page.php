<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use App\Traits\HasSEOConfigurations;

class Page extends Model
{  

    use HashidTrait, HasSEOConfigurations;     

    /**
     * The attributes that are translatable.
     *
     * @var array
     */

    protected $fillable  = ['route_name', 'uri_fullkey', 'description', 'controller', 'method', 'instance_type'];        

    /**
     * method for HasSEOConfigurations. Check the trait for info
     * 
     * @return string url of the page
     */
    public function seoConfigurationUrl() {
        return route($this->route_name);
    }     

     /**
     * Scope to get pages that corresponds to an instance
     *
     * @param      object  $query    Illuminate\Database\Query\Builder     
     * @param      string  path of the instance. App\Models\Page:class for instance
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeInstance($query, $instance)
    {
        return $query->where('instance_type', $instance);        
    }

     /**
     * Scope to search pages without route params
     *
     * @param      object  $query    Illuminate\Database\Query\Builder     
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeWithoutParams($query)
    {
        return $query->where('instance_type', null);        
    }

     /**
     * Scope to search by route name
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      string $route_name name of the route
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeRouteName($query, $route_name)
    {
        return $query->where('route_name', $route_name);        
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