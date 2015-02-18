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
```


### Usage
Currently supported networks:  google+, facebook, twitter, vkontakte, pinterest.<br/>
Ex:
```php
<a href="{{ SocShare::gplus()->getUrl() }}" target="_blank">Google+</a>
<a href="{{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getUrl() }}" target="_blank">Pin it!</a>
```
All parameteres listed in config file.
