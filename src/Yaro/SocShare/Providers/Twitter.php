<?php

namespace Yaro\SocShare\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;


class Twitter
{

    public function __construct($params)
    {
        
    } // end __construct

    public function getUrl()
    {
        $currentUrl = Config::get('soc-share::twitter.url') ? : Request::url();
        $text = Config::get('soc-share::twitter.text') ? : Request::url();
        
        
        $url = 'https://twitter.com/share?'
             . 'url=' . urlencode($currentUrl) .'&'
             . 'text=' . urlencode($text);
             
        $related = Config::get('soc-share::twitter.related', array());
        if ($related) {
            $related = implode(',', $related);
            $url = '&related=' . urlencode($related);
        }   
         
        $hashtags = Config::get('soc-share::twitter.hashtags', array());
        if ($hashtags) {
            $hashtags = implode(',', $hashtags);
            $url = '&hashtags=' . urlencode($hashtags);
        }
        
        $via = Config::get('soc-share::twitter.via');
        if ($via) {
            $url = '&via=' . urlencode($via);
        }
        
        return $url;
    } // end getUrl
    
}

