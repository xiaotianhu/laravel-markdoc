<?php 
namespace Xiaotianhu\Markdoc;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Log;
class ServiceProvider extends LaravelServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindCommands();
        $this->loadRouter();
        $this->loadViewsFrom(__DIR__.'/Views', 'markdoc');

        $this->publish();
    }


    /**
     * 绑定commands
     *
     * @return void
     */
    private function bindCommands()
    {
        if (!$this->app->runningInConsole()) return;
        $this->commands([\Xiaotianhu\Markdoc\Commands\Install::class]);
    }
    
    /**
     * 加载路由
     *
     * @return void
     */
    private function loadRouter()
    {
        $this->loadRoutesFrom(__DIR__.'/router.php');
    }

    public function publish()
    {
        $this->publishes([
            __DIR__.'/Config/markdoc.php' => config_path('markdoc.php'),
        ], 'markdoc-config');
        
        $this->publishes([
            __DIR__.'/Assets' => public_path('vendor/markdoc'),
        ], 'markdoc-assets');
    }
}
