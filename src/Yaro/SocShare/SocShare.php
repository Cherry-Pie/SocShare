<?php

namespace Yaro\SocShare;

//use Illuminate\Support\Facades\Config;
//use Illuminate\Support\Facades\Response;
//use Illuminate\Support\Facades\DB;


class SocShare
{

    public function twitter($params = array())
    {
        $entity = new Providers\Twitter($params);

        return $entity;
    } // end twitter

}

