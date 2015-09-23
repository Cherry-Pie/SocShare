<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Yaro\SocShare\Exceptions\SocShareRequiredInputException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Cache;
use ErrorException;


abstract class AbstractProvider
{

    protected $provider;
    protected $options = array();
    protected $context;


    public function __construct($params)
    {
        $this->options = array_merge(config('yaro.soc-share.'. $this->provider), $params);
        $this->context = stream_context_create(array( 
            'http' => array( 
                'timeout' => config('yaro.soc-share.http_timeout')
            ) 
        ));
    } // end __construct

    protected function getOption($ident, $default = false)
    {
        return $this->options[$ident] ? : $default;
    } // end getOption
    
    protected function getRequiredOption($ident, $default = false)
    {
        $option = $this->getOption($ident, $default);
        if (!$option) {
            throw new SocShareRequiredInputException("SocShare: [{$ident}] option is required for [{$this->provider}].");
        }
        
        return $option;
    } // end getRequiredOption
    
    protected function getCache()
    {
        $minutes = config('yaro.soc-share.cache_minutes');
        if (!$minutes) {
            return null;
        }
        
        $key = 'soc-share.' . $this->provider .'.'. md5(serialize($this->options)); 
        
        return Cache::get($key);
    } // end getCache
    
    protected function setCache($shareCount)
    {
        $minutes = config('yaro.soc-share.cache_minutes');
        if (!$minutes) {
            return null;
        }
        
        $key = 'soc-share.' . $this->provider .'.'. md5(serialize($this->options));
        
        return Cache::put($key, $shareCount, $minutes);
    } // end setCache
    
    protected function fileGetContents($url)
    {
        try {
            return file_get_contents($url, false, $this->context);
        } catch (ErrorException $e) {}
    } // end fileGetContents
    
    public function getJs()
    {
        return "SocShare.show('". $this->getUrl() ."', ". $this->windowHeight .", ". $this->windowWidth .");";
    } // end getJs
    
    abstract public function getUrl();
    
    abstract public function getCount();
    
}

