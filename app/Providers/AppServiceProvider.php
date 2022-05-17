<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::directive('Hitem' , function(){
        //     return 'hello iam hitem ilearn the How To mack Custom Directive';
        // });


        Blade::directive('Admin', function () {
            return "<?php if(auth()->guard('web')->check()) { ?>";
        });

        Blade::directive('elseAdmin', function () {
            return "<?php }else{ ?>";
        });

        Blade::directive('endAdmin', function () {
            return "<?php } ?>";
        });
    }
}
