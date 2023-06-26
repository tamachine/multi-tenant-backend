<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

/**
 * This class overrides the array cast class used by laravel (Illuminate\Database\Eloquent\Casts\AsArrayObject) to cast to an array
 * It is overrided because if the value is null, by default, we want an empty array to be returned and the laravel class returns null
 * In order to use this cast, ArrayCast:class must be used in the model's casts array instead of the 'array' string
 */
class ArrayCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if (! isset($attributes[$key])) {
            return [];
        }

        $data = json_decode($attributes[$key], true);

        return is_array($data) ? new ArrayObject($data) : [];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return [$key => json_encode($value)];
    }

    public function serialize($model, string $key, $value, array $attributes)
    {
        if (! isset($attributes[$key])) {
            return [];
        }

        return $value->getArrayCopy();
    }
}
