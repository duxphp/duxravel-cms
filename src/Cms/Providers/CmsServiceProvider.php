<?php

namespace Modules\Cms\Providers;

use Modules\Cms\Middleware\Web;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 注册主题配置
        $this->mergeConfigFrom(__DIR__ . '/../Config/Theme.php', 'theme');


        // 注册中间件
        $kernel = $this->app->make(Kernel::class);
        $kernel->appendMiddlewareToGroup(Web::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        \Duxravel\Core\Util\Blade::make('marker', \Modules\Cms\Service\Blade::class, 'mark');
        \Duxravel\Core\Util\Blade::loopMake('menu', \Modules\Cms\Service\Blade::class, 'menu');
    }
}
