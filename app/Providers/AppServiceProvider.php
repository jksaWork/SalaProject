<?php

namespace App\Providers;

use App\Models\OrganizationProfile;
use Exception;
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

        try{
            $Profile = OrganizationProfile::first();
            // dd($Profile);
            view()->share('OrganizationProfile' , $Profile);
        }catch(Exception $e){
        }
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
