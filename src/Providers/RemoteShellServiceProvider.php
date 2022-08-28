<?php

namespace Me42th\RemoteShell\Providers;

use Illuminate\Support\ServiceProvider;
use Me42th\RemoteShell\Console\Commands as cmd;
use Me42th\RemoteShell\Services as srv;

class RemoteShellServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                cmd\ClientCommand::class
            ]);
            $this->app->bind('ClientService',function(){
                return new srv\ClientService;
            });
            $this->app->bind('ServerService',function(){
                return new srv\ServerService;
            });
        } else if (config('app.debug')){
            $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/remote-shell.php' => config_path('remote-shell.php')
        ],['remote-shell']);
    }
}
