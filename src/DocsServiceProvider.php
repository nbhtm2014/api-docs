<?php
/**
 * Creator htm
 * Created by 2020/11/13 11:29
 **/

namespace Nbhtm\ApiDocs;

use Illuminate\Support\ServiceProvider;

class DocsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nbhtm');
    }


    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}