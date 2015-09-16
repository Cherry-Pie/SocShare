<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class Tumblr extends AbstractProvider
{

    protected $provider = 'tumblr';
    
    protected $windowWidth  = 540;
    protected $windowHeight = 400;

    
    public function getUrl()
    {
        $url = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl='
             . urlencode($this->getOption('url', Request::url()))
             . '&title=' . urlencode($this->getOption('title'))
             . '&caption=' . urlencode($this->getOption('caption'));
          
        $tags = $this->getOption('tags');
        if ($tags) {
            $url .= '&tags=' . urlencode(implode(',', $tags));
        } 
             
        return $url;
    } // end getUrl
    
    public function getCount()
    {
        $count = $this->getCache();
        if (!is_null($count)) {
            return $count;
        }
        
        $url = 'https://api.tumblr.com/v2/share/stats?url='
             . urlencode($this->getOption('url', Request::url()));
        
        $result = $this->fileGetContents($url);
        
        $count = isset($matches['response']['note_count']) ? $matches['response']['note_count'] : 0;
        $this->setCache($count);
        
        return $count;
    } // end getCount
    
}

