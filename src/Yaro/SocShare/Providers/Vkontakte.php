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
        $currentUrl = $this->getOption('url', Request::url());
        
        $url = 'http://vk.com/share.php?'
             . 'url=' . urlencode($currentUrl);
        
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
    
}

