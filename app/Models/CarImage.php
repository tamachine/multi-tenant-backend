<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HashidTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name', 'file_type', 'main', 'car_id'
    ];

    /**********************************
     * Accessors & Mutators
     **********************************/

    //

    /**********************************
     * Scopes
     **********************************/

    //

    /**********************************
     * Relationships
     **********************************/

    /**
     * Related car
     *
     * @return object
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function assetPath() {
        return asset('storage/car/' . $this->car->hashid . '/' . $this->file_name);
    }
}
