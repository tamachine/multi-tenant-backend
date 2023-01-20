<?php

namespace App\Models;

class Insurance extends Extra
{
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
        if(str_contains($this->name, 'CDW')) {
            return '#8E9AAF';
        } elseif(str_contains($this->name, 'SCDW')) {
            return '#AA78A6';
        } elseif(str_contains($this->name, 'GP')) {
            return '#F5CB5C';
        } elseif(str_contains($this->name, 'TP')) {
            return '#AECBEB';
        } else {
            return '#B4D6D3';
        }
    }
}
