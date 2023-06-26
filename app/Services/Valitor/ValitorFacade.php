<?php
namespace App\Services\Valitor;

use Illuminate\Support\Facades\Facade;

class ValitorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Valitor';
    }
}