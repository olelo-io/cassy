<?php

namespace Olelo\Cassy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string cdn(string $url, string $quality = null)
 *
 *  @see \Olelo\Cassy\Cassy
 */
class Cassy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cassy';
    }
}
