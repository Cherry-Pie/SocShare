## SocShare

Link builder for social share button for Laravel 5.

### Installation
Add dependency to composer.json:
```json
"require": {
    "yaro/soc-share": "1.*"
}
```

Add to config/app.php:
```php
'providers' => array(
//...
    Yaro\SocShare\ServiceProvider::class,
//...
),
'aliases' => array(
//...
    'SocShare' => Yaro\SocShare\Facade::class,
//...
),
```

Then run command:
```shell
$ php artisan vendor:publish --provider="Yaro\SocShare\ServiceProvider"
```


### Usage
Currently supported networks:  google+, facebook, twitter, vkontakte, pinterest, tumblr, odnoklassniki, linkedin.<br/>
Ex:
```html
<a href="{{ SocShare::gplus()->getUrl() }}" target="_blank">Google+ ({{ SocShare::gplus()->getCount() }})</a>
<a href="{{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getUrl() }}" target="_blank">Pin it!</a>
```

To get share count call ```getCount()``` ia your network provider with the same parameters:
```html
<a href="{{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getUrl() }}" target="_blank">
    Already {{ SocShare::pinterest(['media' => asset('/img/pin.png'), 'description' => 'oh hai'])->getCount() }}
</a>
```

Or go with js to open share dialog in new window:
```html
{{ SocShare::renderJs() }}

<a onclick="{{ SocShare::vk()->getJs() }}" href="javascript:void(0);">Share me</a>
```


All parameteres listed in config file.
