<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class Twitter extends AbstractProvider
{

    protected $provider = 'twitter';


    public function getUrl()
    {
        $currentUrl = $this->getOption('url', Request::url());
        
        $url = 'https://twitter.com/share?'
             . 'url=' . urlencode($currentUrl);
             
        $text = $this->getOption('text');
        if ($text) {
            $url .= '&text=' . urlencode($text);
        }    
           
        $related = $this->getOption('related');
        if ($related) {
            $related = implode(',', $related);
            $url .= '&related=' . urlencode($related);
        }   
         
        $hashtags = $this->getOption('hashtags');
        if ($hashtags) {
            $hashtags = implode(',', $hashtags);
            $url .= '&hashtags=' . urlencode($hashtags);
        }
        
        $via = $this->getOption('via');
        if ($via) {
            $url .= '&via=' . urlencode($via);
        }
        
        return $url;
    } // end getUrl
    
}

