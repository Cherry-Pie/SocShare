<?php

namespace Yaro\SocShare;


class Facade extends \Illuminate\Support\Facades\Facade
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