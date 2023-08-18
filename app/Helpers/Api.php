<?php

namespace App\Helpers;

use ReflectionObject;
use ReflectionProperty;

class Api
{
    /**
     * map a collection into its apiResponse
     *
     * @return array
     */
    public static function mapApiRepsonse($collection, $locale = null)
    {
        return $collection->map(function ($item) use ($locale) {
            return $item->toApiResponse($locale);
        });
    }

    /**
     * returns the public properties of a class
     * @return array
     */
    public static function getPublicPropertiesOfClass($class):array {
        return (new ReflectionObject($class))->getProperties(ReflectionProperty::IS_PUBLIC);
    }

    /**
     * Returns the generic error response
     */
    public static function errorResponse($code, $message) {
        return response()->json([
            'success'  => false,
            'code'     => $code,
            'message'  => $message
        ], $code);
    }
}
