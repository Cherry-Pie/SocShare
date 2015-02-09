<?php 

namespace Yaro\SocShare;

use Illuminate\Support\ServiceProvider;


class SocShareServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
    
    public function boot()
    {
        $this->package('yaro/soc-share');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['yaro_soc_share'] = $this->app->share(function($app) {
            return new SocShare();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
