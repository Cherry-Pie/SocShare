## SocShare

Link builder for social share button.

### Installation
Add dependency to composer.json:
```json
"require": {
    "yaro/soc-share": "0.*"
}
```

Add to app/config/app.php:
```php
'providers' => array(
//...
    'Yaro\SocShare\SocShareServiceProvider',
//...
),
'aliases' => array(
//...
    'SocShare' => 'Yaro\SocShare\Facades\SocShare',
//...
),
```

Then run commands:
```shell
$ php artisan config:publish yaro/soc-share
$ php artisan asset:publish yaro/soc-share
```


### Usage
Currently supported networks:  google+, facebook, twitter, vkontakte, pinterest.<br/>
Ex:
```html
<a href="{{ SocShare::gplus()->getUrl() }}" target="_blank">Google+</a>
<a href="{{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getUrl() }}" target="_blank">Pin it!</a>
```

Or go with js to open share dialog in new window:
```html
{{ SocShare::renderJs() }}

<a onclick="{{ SocShare::vk()->getJs() }}" href="javascript:void(0);">Share me</a>
```

All parameteres listed in config file.
