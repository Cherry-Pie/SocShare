<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class GooglePlus extends AbstractProvider
{

    protected $provider = 'gplus';

    
    public function getUrl()
    {
        $url = 'https://plus.google.com/share?'
             . 'url=' . urlencode($this->getOption('url', Request::url()));
             
        $language = $this->getOption('hl');
        if ($language) {
            $url .= '&hl=' . $language;
        }
             
        return $url;
    } // end getUrl
    
}

