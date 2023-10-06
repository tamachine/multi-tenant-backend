<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyRate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id', 'rate',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */

    protected $with = ['currency'];

    /**********************************
     * Accessors & Mutators
     **********************************/

    /**
     * Get the rate's edit URL
     *
     * @return     string
     */
    public function getEditUrlAttribute()
    {
        return route('intranet.admin.rate.edit', $this->id);
    }

    /**********************************
     * Relations
     **********************************/
    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id','hashid');
    }
    
}
