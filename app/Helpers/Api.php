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
    public static function mapApiRepsonse($collection)
    {
        return $collection->map(function ($item) {
            return $item->toApiResponse();
        });
    }

    public static function getPublicPropertiesOfClass($class):array {
        return (new ReflectionObject($class))->getProperties(ReflectionProperty::IS_PUBLIC);
    }
}
