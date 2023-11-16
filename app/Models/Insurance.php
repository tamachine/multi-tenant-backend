<?php

namespace App\Models;

use App\Traits\HasApiResponse;

class Insurance extends Extra
{
    use HasApiResponse;

    protected $apiResponse = ['hashid', 'active','name', 'description', 'image', 'color', 'price_mode', 'features', 'caren_id', 'price_from'];

    protected $table = 'extras';
 
    protected $append = ['color'];

    protected $with = ['carenExtra','features'];

    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function ($query) {
            $query->where('category', 'insurance');
        });
    }    

    public function getColorAttribute() {   
        if($this->caren_id) {
            if($this->caren_id == 366) {
                return '#8E9AAF';
            } elseif($this->caren_id == 367) {
                return '#F5CB5C';
            } elseif($this->caren_id == 368) {
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
