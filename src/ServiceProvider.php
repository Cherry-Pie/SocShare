<?php 

namespace Yaro\SocShare;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    
    public function boot()
    {
        $this->app['router']->get('_soc-share/close/window', function() {
            return '<html><body><script>window.close()</script></body></html>';
        });
        
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('yaro.soc-share.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../public' => public_path('packages/yaro/soc-share'),
        ], 'public');
    } // end boot

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'yaro.soc-share.php');

        $this->app['yaro_soc_share'] = $this->app->share(function($app) {
            return new SocShare();
        });
    } // end register

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    } // end provides

}
