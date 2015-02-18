<?php

return array(

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
    
        'href'         => '', // leave empty to get current
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

);

