<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Illuminate\Support\Facades\Request;


class Vkontakte extends AbstractProvider
{

    protected $provider = 'vk';
    
    protected $windowWidth  = 590;
    protected $windowHeight = 415;

    
    public function getUrl()
    {
        $url = 'http://vk.com/share.php?'
             . 'url=' . urlencode($this->getOption('url', Request::url()));
        
        $title = $this->getOption('title');
        if ($title) {
            $url .= '&title=' . urlencode($title);
        }
        
        $description = $this->getOption('description');
        if ($description) {
            $url .= '&description=' . urlencode($description);
        }
        
        $image = $this->getOption('image');
        if ($image) {
            $url .= '&image=' . urlencode($image);
        }
        
        $noparse = $this->getOption('noparse') ? 'true' : 'false';
        $url .= '&noparse=' . $noparse;

        return $url;
    } // end getUrl
        
    public function getCount()
    {
        $url = 'https://vk.com/share.php?act=count&index=1&url=' 
             . urlencode($this->getOption('url', Request::url()));
             
        $result = file_get_contents($url);
        preg_match('~VK\.Share\.count\(\d+,\s*(\d+)\);~', $result, $matches);

        return isset($matches[1]) ? $matches[1] : 0;
    } // end getCount
    
}
