<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HashidTrait;
use App\Traits\HasSEOConfigurations;
use \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Page extends Model implements LocalizedUrlRoutable
{  

    use HashidTrait, HasSEOConfigurations, HasApiResponse;         

    protected $apiResponse = ['route_name'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */

    protected $fillable  = ['route_name', 'uri_fullkey', 'description', 'controller', 'method', 'instance_type'];           


    /**
     * Returns for a given locale the translated slug
     * It is used for translatable routes in mcnamara localization package and in Services\SeoCOnfigurations class. 
     * This method has to be defined when implementing LocalizedUrlRoutable
     * @return string
     */
    public function getLocalizedRouteKey($locale)
    {
        return $this->hashid;
    }

    public function url($instance = null) {
        if($this->instance_type !== null) {
            return route($this->route_name, $instance);
        } else {
            return route($this->route_name);
        }
    }

     /**
     * Scope to get pages that corresponds to an instance
     *
     * @param      object  $query     Illuminate\Database\Query\Builder     
     * @param      object  $instance. An instance of a model
     * 
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeInstance($query, $instance)
    {
        return $query->where('instance_type', get_class($instance));        
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

    /**
     * Get the SEO Configurations.
     */
    public function SEOConfigurationsSamePage()
    {        
        return $this->hasMany(SeoConfiguration::class, 'page_id', 'id');
    }
}