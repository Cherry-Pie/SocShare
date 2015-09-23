<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class Linkedin extends AbstractProvider
{

    protected $provider = 'linkedin';
    
    protected $windowWidth  = 520;
    protected $windowHeight = 570;

    
    public function getUrl()
    {
        $url = 'https://www.linkedin.com/shareArticle?mini=true'
             . '&url=' . urlencode($this->getOption('url', Request::url()))
             . '&title=' . urlencode($this->getOption('title'))
             . '&summary=' . urlencode($this->getOption('summary'))
             . '&source=' . urlencode($this->getOption('source'));
 
        return $url;
    } // end getUrl
        
    public function getCount()
    {
        $count = $this->getCache();
        if (!is_null($count)) {
            return $count;
        }
        
        $url = 'http://www.linkedin.com/countserv/count/share?format=json&url='
             . urlencode($this->getOption('url', Request::url()));
        
        $result = $this->fileGetContents($url);
        $result = json_decode($result, true);

        $count = isset($result['count']) ? $result['count'] : 0;
        $this->setCache($count);
        
        return $count;
    } // end getCount
    
}

