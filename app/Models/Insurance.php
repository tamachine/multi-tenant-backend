<?php

namespace App\Models;

use App\Traits\HasApiResponse;

class Insurance extends Extra
{
    use HasApiResponse;

    protected $apiResponse = ['hashid', 'active','name', 'description', 'image', 'color', 'price_mode', 'features', 'caren_id'];

    protected $table = 'extras';
 
    protected $append = ['color'];

    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function ($query) {
            $query->where('category', 'insurance');
        });
    }    

    public function getColorAttribute() {   
        if($this->caren_id) {
            if(str_contains($this->carenExtra->name, 'SCDW')) {
                return '#AA78A6';
            } elseif(str_contains($this->carenExtra->name, 'CDW')) {
                return '#8E9AAF';
            } elseif(str_contains($this->carenExtra->name, 'GP')) {
                return '#F5CB5C';
            } elseif(str_contains($this->carenExtra->name, 'TP')) {
                return '#AECBEB';
            } else {
                return '#B4D6D3';
            }
        } else {
            return '#B4D6D3';
        }     
    }

    /**
     * Define belongsToMany extras
     *
     * @return object
     */
    public function features()
    {
        return $this->belongsToMany('App\Models\Feature')->withTimestamps();
    }   
    
}
