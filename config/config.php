<?php

return array(

    // timeout in seconds for http request to retrieve share count
    'http_timeout' => 2,
    
    // to cache share count, leave 0 to disable caching
    'cache_minutes' => 60,

    // https://dev.twitter.com/web/tweet-button/parameters
    'twitter' => array(
        'url'      => '', // leave empty to get current
        'via'      => '',
        'related'  => array(),
        'hashtags' => array(),
        'text'     => '',
    ),
    
    // https://developers.pinterest.com/pin_it/
    'pinterest' => array(
        'url'          => '', // leave empty to get current
        'media'        => '', // required
        'description'  => '',
    ),
    
    // https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.2
    'facebook' => array(
        'type' => 'share', // dialog|share
    
        'url'         => '', // leave empty to get current
        'app_id'       => '', // required if dialog type setted
        'redirect_uri' => '',
        'display'      => 'popup',
        'from'         => '',
        'to'           => '',
        'picture'      => '',
        'source'       => '',
        'name'         => '',
        'caption'      => '',
        'description'  => '',
        'properties'   => array(), // ['some' => ['text' => 'text', 'href' => 'href']]
        'actions'      => array(), // ['name' => 'name', 'link' => 'link']
        'ref'          => array(),
    ),
    
    // https://developers.google.com/+/web/share/
    'gplus' => array(
        'url' => '', // leave empty to get current
        'hl'  => '', // https://developers.google.com/+/web/share/#available-languages
    ),
    
    // https://vk.com/dev/share_details
    'vk' => array(
        'url'         => '', // leave empty to get current
        'title'       => '',
        'description' => '',
        'image'       => '',
        'noparse'     => false, // true|false
    ),
    
    // https://www.tumblr.com/docs/ru/share_button
    'tumblr' => array(
        'url'     => '', // leave empty to get current
        'title'   => '',
        'caption' => '',
        'tags'    => array(), // ['tag', 'newtag', 'onemoretag']
    ),
    
    // https://apiok.ru
    'ok' => array(
        'url' => '', // leave empty to get current
    ),

    // https://developer.linkedin.com/docs/share-on-linkedin
    'linkedin' => array(
        'url'     => '', // leave empty to get current
        'title'   => '', 
        'summary' => '',
        'source'  => '',
    ),
	
);

