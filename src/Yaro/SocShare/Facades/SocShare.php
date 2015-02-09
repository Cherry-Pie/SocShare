<?php

namespace Yaro\SocShare\Facades;

use Illuminate\Support\Facades\Facade;


class SocShare extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'yaro_soc_share';
    } // end getFacadeAccessor

}