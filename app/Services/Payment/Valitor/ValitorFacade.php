<?php
namespace App\Services\Payment\Valitor;

use Illuminate\Support\Facades\Facade;

class ValitorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Valitor';
    }
}