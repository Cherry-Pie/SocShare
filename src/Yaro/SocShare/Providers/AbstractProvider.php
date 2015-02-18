<?php

namespace Yaro\SocShare\Providers;

use Yaro\SocShare\Providers\AbstractProvider;
use Yaro\SocShare\Exceptions\SocShareRequiredInputException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;


abstract class AbstractProvider
{

    protected $provider;
    protected $options = array();    


    public function __construct($params)
    {
        $this->options = array_merge(Config::get('soc-share::'. $this->provider), $params);
    } // end __construct

    public function getOption($ident, $default = false)
    {
        return $this->options[$ident] ? : $default;
    } // end getOption
    
    public function getRequiredOption($ident, $default = false)
    {
        $option = $this->getOption($ident, $default);
        if (!$option) {
            throw new SocShareRequiredInputException("SocShare: [{$ident}] option is required for [{$this->provider}].");
        }
        
        return $option;
    } // end getRequiredOption
    
    
}

