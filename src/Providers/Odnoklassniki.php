<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class Odnoklassniki extends AbstractProvider
{

    protected $provider = 'ok';
    
    protected $windowWidth  = 585;
    protected $windowHeight = 275;

    
    public function getUrl()
    {
        $url = 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl='
             . urlencode($this->getOption('url', Request::url()));
             
        return $url;
    } // end getUrl
    
    public function getCount()
    {
        $count = $this->getCache();
        if (!is_null($count)) {
            return $count;
        }
        
        $url = 'https://connect.ok.ru/dk?st.cmd=extLike&uid=hai&ref='
             . urlencode($this->getOption('url', Request::url()));
        
        $result = $this->fileGetContents($url);
        preg_match("~^ODKL\.updateCount\('hai','(\d+)'\);~", $result, $matches);
        
        $count = isset($matches[1]) ? $matches[1] : 0;
        $this->setCache($count);
        
        return $count;
    } // end getCount
    
}

