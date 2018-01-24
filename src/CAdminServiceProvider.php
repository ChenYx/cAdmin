<?php
namespace CAdmin;

use Illuminate\Support\ServiceProvider;

class CAdminServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (method_exists($this, 'publishes')) {
            $this->publishes([
                __DIR__ . '/view' => resource_path('/views/cAdmin'),
                __DIR__ . '/public' => public_path('/assets/cAdmin'),
            ], 'cAdmin-static');
            $this->publishes([
                __DIR__ . '/cAdmin.php' => config_path('/cAdmin.php'),
            ], 'cAdmin-config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
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
