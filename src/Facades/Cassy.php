<?php

namespace Olelo\Cassy\Facades;

use Illuminate\Support\Facades\Facade;

class Cassy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cassy';
    }
}
