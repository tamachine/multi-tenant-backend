<?php
namespace App\Services\RoutesForPages;

use Illuminate\Support\Facades\Facade;

class RoutesForPagesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RoutesForPages';
    }
}