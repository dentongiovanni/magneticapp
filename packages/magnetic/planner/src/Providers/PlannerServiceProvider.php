<?php

namespace Magnetic\Planner\Providers;

use Illuminate\Support\ServiceProvider;
use Magnetic\Planner\Providers\PlannerEventServiceProvider;

class PlannerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         $this->mergeMigrations();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../routes/web.php';
        include __DIR__.'/../routes/api.php';
        $this->loadViewsFrom(__DIR__.'/../views', 'planner');
        $this->mergeConfig();
        $this->app->register(PlannerEventServiceProvider::class);
     }


    public function mergeConfig()
    {
        $path = $this->getConfigPath();
        $this->mergeConfigFrom($path, 'planner');
    }

    public function mergeMigrations(){
        $path = $this->getMigrationsPath();
        $this->loadMigrationsFrom($path);
    }
 

    public function getConfigPath()
    {
        return  __DIR__.'/../../config/planner.php';
    }


    public function getMigrationsPath()
    {
        return __DIR__.'/../../database/migrations/';
    }
}
