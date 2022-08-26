<?php

namespace Me42th\RemoteShell;

use Illuminate\Support\ServiceProvider;

class RemoteShellServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__.'/remote-shell.php' => config_path('remote-shell.php')
        ], 'config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ClientCommand::class
            ]);
            $this->app->bind('ClientService',function(){
                return new ClientService;
            });
            $this->app->bind('ServerService',function(){
                return new ServerService;
            });
        } else if (config('app.debug')){
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }
    }
}
